// Sample data and renderer for gamersay with filters
const weekly = [
  {id:1,title:'Elden Ring',platform:'PC/PS5/Xbox',rating:9.6,desc:'Open-world RPG with deep combat.',img:'https://via.placeholder.com/400x240?text=Elden+Ring'},
  {id:2,title:'Hades II',platform:'PC',rating:9.2,desc:'Fast-paced roguelike with narrative.',img:'https://via.placeholder.com/400x240?text=Hades+II'},
  {id:3,title:'Hi-Fi Rush',platform:'PC/Xbox',rating:8.9,desc:'Rhythm-based action with colorful style.',img:'https://via.placeholder.com/400x240?text=Hi-Fi+Rush'}
]
const yearly = [
  {id:11,title:'The Last of Us Part II',platform:'PS4/PS5',rating:9.8,desc:'Story-driven emotional adventure.',img:'https://via.placeholder.com/400x240?text=TLOU+Part+II'},
  {id:12,title:'God of War (2018)',platform:'PS4',rating:9.7,desc:'A reinvention of the franchise with deep narrative.',img:'https://via.placeholder.com/400x240?text=God+of+War'},
  {id:13,title:'Breath of the Wild',platform:'Switch',rating:9.9,desc:'Open-ended exploration and discovery.',img:'https://via.placeholder.com/400x240?text=BotW'}
]

const $ = sel => document.querySelector(sel)

function renderGames(list){
  const container = $('#games')
  container.innerHTML = ''
  if(list.length===0){
    container.innerHTML = '<p style="color:var(--muted)">No games match the filters.</p>'
    return
  }
  list.forEach(g=>{
    const card = document.createElement('article')
    card.className = 'card'
    card.innerHTML = `
      <img src="${g.img}" alt="${g.title} cover" />
      <div class="body">
        <h3>${g.title}</h3>
        <div class="meta">${g.platform}</div>
        <div class="desc">${g.desc}</div>
        <div class="rating">Rating: ${g.rating}</div>
      </div>`
    container.appendChild(card)
  })
}

function setActive(period){
  $('#btn-week').classList.toggle('active', period==='week')
  $('#btn-year').classList.toggle('active', period==='year')
}

function getCurrentList(){
  return $('#btn-week').classList.contains('active') ? weekly : yearly
}

function gatherFilters(){
  return {
    term: $('#search').value.trim().toLowerCase(),
    platform: $('#platform').value,
    minRating: parseFloat($('#min-rating').value) || 0,
    sort: $('#sort').value
  }
}

function applyFilters(list, filters){
  let out = list.slice()
  if(filters.term){
    out = out.filter(g=> (g.title+g.platform+g.desc).toLowerCase().includes(filters.term))
  }
  if(filters.platform && filters.platform!=='all'){
    out = out.filter(g=> g.platform.toLowerCase().includes(filters.platform.toLowerCase()))
  }
  if(!isNaN(filters.minRating) && filters.minRating>0){
    out = out.filter(g=> g.rating >= filters.minRating)
  }
  // sorting
  if(filters.sort==='rating-desc') out.sort((a,b)=>b.rating - a.rating)
  else if(filters.sort==='rating-asc') out.sort((a,b)=>a.rating - b.rating)
  else if(filters.sort==='title-asc') out.sort((a,b)=>a.title.localeCompare(b.title))
  return out
}

function populatePlatformOptions(){
  const select = $('#platform')
  const combined = [...weekly, ...yearly]
  const platforms = new Set()
  combined.forEach(g=>{ g.platform.split(/[,/]/).map(s=>s.trim()).forEach(p=>platforms.add(p)) })
  Array.from(platforms).sort().forEach(p => {
    const opt = document.createElement('option')
    opt.value = p
    opt.textContent = p
    select.appendChild(opt)
  })
}

function updateRatingValue(){
  $('#rating-value').textContent = $('#min-rating').value
}

function refresh(){
  const list = getCurrentList()
  const filters = gatherFilters()
  const result = applyFilters(list, filters)
  renderGames(result)
}

// wire controls
$('#btn-week').addEventListener('click', ()=>{ setActive('week'); refresh() })
$('#btn-year').addEventListener('click', ()=>{ setActive('year'); refresh() })
$('#search').addEventListener('input', ()=> refresh())
$('#platform').addEventListener('change', ()=> refresh())
$('#min-rating').addEventListener('input', ()=>{ updateRatingValue(); refresh() })
$('#sort').addEventListener('change', ()=> refresh())
$('#clear-filters').addEventListener('click', ()=>{
  $('#search').value = ''
  $('#platform').value = 'all'
  $('#min-rating').value = 0
  $('#sort').value = 'rating-desc'
  updateRatingValue()
  refresh()
})

// initial setup
populatePlatformOptions()
updateRatingValue()
setActive('week')
refresh()
