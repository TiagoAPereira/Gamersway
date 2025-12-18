// Simple browser-based chat using BroadcastChannel with localStorage fallback.
(function(){
  const msgList = document.getElementById('messages');
  const peersList = document.getElementById('peers');
  const input = document.getElementById('message');
  const sendBtn = document.getElementById('send');
  const nameInput = document.getElementById('username');
  const roomInput = document.getElementById('room');

  const HISTORY_KEY = 'gamersway-chat-history';
  const PEERS_KEY = 'gamersway-chat-peers';

  let bc = null;
  try { bc = new BroadcastChannel('gamersway-chat'); } catch(e) { bc = null; }

  function uid(){return Math.random().toString(36).slice(2,9)}
  const clientId = uid();

  function now(){return new Date().toISOString();}

  function loadHistory(){
    try{
      const raw = localStorage.getItem(HISTORY_KEY);
      return raw ? JSON.parse(raw) : [];
    }catch(e){return []}
  }

  function saveHistory(arr){
    try{ localStorage.setItem(HISTORY_KEY, JSON.stringify(arr)); }catch(e){}
  }

  function renderMessage(m){
    const el = document.createElement('div'); el.className='message';
    const meta = document.createElement('div'); meta.className='meta';
    meta.textContent = `${m.user || 'anon'} • ${new Date(m.ts).toLocaleTimeString()}`;
    const text = document.createElement('div'); text.className='text'; text.textContent = m.text;
    el.appendChild(meta); el.appendChild(text);
    msgList.appendChild(el);
    msgList.scrollTop = msgList.scrollHeight;
  }

  function broadcast(obj){
    if(bc) try{ bc.postMessage(obj); }catch(e){}
    // also persist to localStorage to allow other windows to pick it up
    const h = loadHistory(); h.push(obj); saveHistory(h);
    // emit a storage event mimic for same-tab listeners
    try{ localStorage.setItem('gamersway-last', JSON.stringify({k:Date.now()})); }catch(e){}
  }

  function sendMessage(){
    const text = input.value.trim();
    if(!text) return;
    const m = {type:'message', id:uid(), ts:now(), user: nameInput.value || 'anon', room: roomInput.value || 'global', text: text, from: clientId};
    renderMessage(m);
    broadcast(m);
    input.value = '';
    updatePeers(nameInput.value || 'anon');
  }

  sendBtn.addEventListener('click', sendMessage);
  input.addEventListener('keydown', function(e){ if(e.key==='Enter'){ e.preventDefault(); sendMessage(); } });

  // Incoming message handler
  function handleIncoming(m){
    if(!m || m.room !== (roomInput.value || 'global')) return;
    if(m.from === clientId) return; // already rendered
    if(m.type === 'join'){
      const note = {user: m.user||'anon', ts:m.ts, text: `${m.user||'anon'} joined`}; renderMessage(note);
      updatePeers(m.user||'anon', true);
    } else if(m.type === 'leave'){
      const note = {user: m.user||'anon', ts:m.ts, text: `${m.user||'anon'} left`}; renderMessage(note);
      updatePeers(m.user||'anon', false);
    } else if(m.type === 'message'){
      renderMessage(m);
      updatePeers(m.user||'anon');
    }
  }

  // Listen via BroadcastChannel
  if(bc) {
    bc.onmessage = (ev)=>{ handleIncoming(ev.data); };
  }

  // Fallback: listen to storage events for other tabs
  window.addEventListener('storage', function(e){
    if(e.key === HISTORY_KEY) {
      const h = loadHistory();
      // render latest items (simple approach)
      msgList.innerHTML = '';
      h.filter(it => it.room === (roomInput.value||'global')).forEach(renderMessage);
    }
  });

  // Simple peers list management (per-tab)
  function loadPeers(){ try{ return JSON.parse(localStorage.getItem(PEERS_KEY)||'[]'); }catch(e){return []} }
  function savePeers(list){ try{ localStorage.setItem(PEERS_KEY, JSON.stringify(list)); }catch(e){} }
  function updatePeers(name, add){
    let list = loadPeers();
    if(add===false){ list = list.filter(p=>p!==name); }
    else if(name && !list.includes(name)) list.push(name);
    savePeers(list);
    peersList.innerHTML = '';
    list.forEach(p=>{ const li=document.createElement('li'); li.textContent=p; peersList.appendChild(li); });
  }

  // initialize UI from history
  (function init(){
    const hist = loadHistory();
    hist.filter(it => it.room === (roomInput.value||'global')).forEach(renderMessage);
    // announce join
    const join = {type:'join', id:uid(), ts:now(), user: nameInput.value||'anon', room: roomInput.value||'global', from: clientId};
    broadcast(join);
    updatePeers(nameInput.value||'anon', true);
  })();

  // announce leave on unload
  window.addEventListener('beforeunload', function(){
    const leave = {type:'leave', id:uid(), ts:now(), user: nameInput.value||'anon', room: roomInput.value||'global', from: clientId};
    broadcast(leave);
  });

  // react to room changes: reload list
  roomInput.addEventListener('change', function(){
    msgList.innerHTML = '';
    loadHistory().filter(it => it.room === (roomInput.value||'global')).forEach(renderMessage);
  });

  // react to username changes: update peers
  nameInput.addEventListener('change', function(){ updatePeers(nameInput.value||'anon', true); broadcast({type:'join', id:uid(), ts:now(), user: nameInput.value||'anon', room: roomInput.value||'global', from: clientId}); });

})();
