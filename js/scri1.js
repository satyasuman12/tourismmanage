const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
	wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
	wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
	wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
	wrapper.classList.remove('active-popup');
});
document.getElementById("b1").addEventListener("click", function(){
	document.querySelector(".overlay").style.display = "flex";
});
document.querySelector(".icon-close").addEventListener("click", function(){
	document.querySelector(".overlay").style.display = "none";
});
document.getElementById("b1").addEventListener("click", function(){
	document.querySelector(".wrapper").style.display = "flex";
});
document.querySelector(".icon-close").addEventListener("click", function(){
	document.querySelector(".wrapper").style.display = "none";
});

// document.querySelector(".btnLogin-popup").addEventListener("click",function(){
// 	document.querySelector(".wrapper").classlist.add("active-popup");
// });