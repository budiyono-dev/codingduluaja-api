 // console.log('reset', document.getElementById('selQty').value = '');
 let daftarIsi = document.querySelectorAll('#TableOfContents ul li a');
        
 const resetActive = () => {
   daftarIsi.forEach(el => el.classList.remove('active'));
 }
 const toggleActiveDaftarIsi = (el) => {
   console.log(el)
   console.log('activate link');
   resetActive();
   el.target.classList.add('active');
 }
 daftarIsi.forEach(el => {
   // console.log(el);
   el.addEventListener('click',toggleActiveDaftarIsi);
 });