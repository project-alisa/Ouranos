document.addEventListener('DOMContentLoaded',()=>{
    var lang_sb = document.getElementById('language');
    var url = location.href;

    lang_sb.onchange = ()=>{
        var value = lang_sb.value;
        if(url.search(/\?/) !== -1){
            if(url.search(/lang=../) !== -1){
                location.href = url.replace(/lang=../,'lang='+value);
            }else{
                location.href = url + '&lang=' + value;
            }
        }else{
            location.href = url + '?lang=' + value;
        }
    }
});