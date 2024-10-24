const formthem = document.getElementById('formthem');
const formsua = document.getElementById('formsua');
const formxem = document.getElementById('formxem');
const formMaincontent = document.getElementById('formMaincontent');
const formSearch = document.querySelector('.formSearch');
const btnTim = document.getElementById('btnTim');

const btnHuyThem = document.getElementById('btnHuyThem');
const btnHuySua = document.getElementById('btnHuySua');
const btnDong = document.getElementById('btnDong')

const btnThem = document.getElementById('btnThem');
const btnXoas = document.querySelectorAll(".btnXoa");
const btnSuas = document.querySelectorAll(".btnSua"); 
const btnXems = document.querySelectorAll(".btnxem"); 

const btnLuuThem = document.getElementById('btnLuuThem');
const btnLuuSua = document.getElementById('btnLuuSua');

const successMessageThem = document.getElementById('successMessageThem');
const successMessageSua = document.getElementById('successMessageSua');

formSearch.addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn trang tải lại
    // 
    console.log('Tìm kiếm đã được thực hiện.');
});

btnThem.addEventListener("click", function(){
    formthem.style.display = "block";
    formMaincontent.style.display = "none";
});

btnSuas.forEach(function(button) {
    button.addEventListener("click", function() {
        formsua.style.display = "block";
        formMaincontent.style.display = "none";
    });
});

btnXoas.forEach(function(button) {
    button.addEventListener("click", function() {
        document.getElementById("confirmBox").classList.remove("hidden");
    });
});

btnXems.forEach(function(button) {
    button.addEventListener("click", function() {
        formxem.style.display = "block";
        formMaincontent.style.display = "none";
    });
});

btnDong.addEventListener("click", function(event){
    event.preventDefault();
    formxem.style.display = "none";
    formMaincontent.style.display = "block";
});

btnHuyThem.addEventListener("click", function(event){
    event.preventDefault();
    formthem.style.display = "none";
    formMaincontent.style.display = "block";
});

btnHuySua.addEventListener("click", function(event){
    event.preventDefault();
    formsua.style.display = "none";
    formMaincontent.style.display = "block";
});

btnLuuThem.addEventListener('click', function() {
    successMessageThem.classList.remove('hidden');
    setTimeout(function() {
        successMessageThem.classList.add('hidden');
    }, 1000);
    event.preventDefault();
    formthem.style.display = "none";
    formMaincontent.style.display = "block";
});

btnLuuSua.addEventListener('click', function() {
    successMessageSua.classList.remove('hidden');
    setTimeout(function() {
        successMessageSua.classList.add('hidden');
    }, 1000);
    event.preventDefault();
    formsua.style.display = "none";
    formMaincontent.style.display = "block";
});

document.getElementById("btnNo").addEventListener("click", function() {
    document.getElementById("confirmBox").classList.add("hidden");
});

document.getElementById("btnYes").addEventListener("click", function() {
    document.getElementById("confirmBox").classList.add("hidden");
});
