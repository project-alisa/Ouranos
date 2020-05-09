const showMessage = (text) => {
    var messageElement = document.getElementById('flash_message');
    if(messageElement !== null){
        messageElement.remove();
    }
    messageElement = document.createElement('div');
    messageElement.setAttribute('id','flash_message');

    text.split(':').forEach(function(t){
        let messageText = document.createElement('p');
        messageText.innerText = t;
        messageElement.appendChild(messageText);
    });

    document.querySelector('body').appendChild(messageElement);
}

const setClipboard = (text) => {
    navigator.clipboard.writeText(text).then(() => {
        showMessage('コピーされました:クリップボードにコピーされました:Copied to clipboard.');
    }, (err) => {
        alert('クリップボードにテキストをコピーできませんでした\nCopy to clipboard failed.\n\n'+err);
    });
}
