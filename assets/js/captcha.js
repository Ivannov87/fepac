function SendForm() {
    
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ld7gUMdAAAAABKcIF4cTj9AVON9xRAlRB9HQUWX', {
            
            action: 'procesar'
        }).then(function(token) {
            document.getElementById('token').value = token;
            //document.getElementById('btnSend').submit();
        });
    });

    
} 

function SendF() {
    
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ld7gUMdAAAAABKcIF4cTj9AVON9xRAlRB9HQUWX', {
            
            action: 'procesar'
        }).then(function(token) {
            document.getElementById('token').value = token;
            document.getElementById("btnEnviar").submit();
        });
    });
}