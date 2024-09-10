$('.remove_session').click(function () {
    deleteCookie('PHPSESSID')
    alert('Đăng xuất thành công!')
    window.location.href = '/auth/logout.php'
});


function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
