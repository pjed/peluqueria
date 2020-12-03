/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sendEmail() {
    var from = document.getElementById("from").value;
    var body = document.getElementById("body").value;
    Email.send({
        Host: "smtp.gmail.com",
        Username: "peluqueriaelpaisano@gmail.com",
        Password: "Pedro@110387",
        To: 'peluqueriaelpaisano@gmail.com',
        From: from,
        Subject: "Contacto",
        Body: body,
    })
            .then(function (message) {
                alert("¡¡¡ Correo enviado correctamente !!!")
            });
} 