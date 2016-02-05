// This fixes responsive image problem with 'aligncenter' in Wordpress
document.addEventListener('DOMContentLoaded',function()
{
    var elems = document.getElementsByClassName("aligncenter");
    for (var i = 0; i < elems.length; i++)
        elems.item(i).parentNode.classList.add('aligncenter');
});