const btn = document.querySelector('.btn')
btn.addEventListener("click",(e)=>{
    e.value = 'submitted'
    console.log(e.value)
})