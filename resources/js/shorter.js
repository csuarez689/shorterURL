window.shorter = {

    short_url:()=>{
        let long_url=document.getElementById('long_url').value;
        if (shorter.validate_url(long_url)) {
            //send request
            axios.post('/url', {
                long_url: long_url
            }).then((response) => {
                document.getElementById('long_url').value = '';
                document.getElementById('short_url').value = response.data.short_url;
                document.getElementById('short_url_container').style.display = 'block';
            })
                .catch((err) => console.log(err));
        }

    },

    copy_url: () => {
        let short_url = document.getElementById('short_url');
        short_url.select();
        short_url.setSelectionRange(0, 9999999);
        document.execCommand('copy');
    },

    validate_url: (url) => {
        let status = true;
        if (url.trim() == "") {
            status = false;
            alert('Debes ingresar una url.');
        } else if (!validUrl.isWebUri(url)) {
            status = false;
            alert('La URL es invalida.');
        }
        return status;
    },

}
