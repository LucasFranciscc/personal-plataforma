function convertHeight(cm) {
    return cm / 100;
}

var calculate = $('#calculate');
var result = $('#xs-bmi-info');
result.fadeOut();
calculate.on('click', function (e) {
    e.preventDefault();
    var weight = $('#xs-weight').val();
    var height = $('#xs-height').val();
    var height = convertHeight(height);
    if (height !== '' && weight !== '') {
        bmi = parseFloat(weight / (height * height)).toFixed(2);
        if (bmi > 25) {
            result.html('<div class="xs-icon bg-warning"><spna class="icon icon-thumbs-down"></spna></div><p style="color: #FFFFFF"> <span class="text-warning"><strong>Ops! Você está acima do peso.</strong></span> Seu IMC é: ' + bmi + ' </p>').fadeIn();
        } else if (bmi < 18.5) {
            result.html('<div class="xs-icon bg-info"><spna class="icon icon-thumbs-down"></spna></div><p style="color: #FFFFFF"> <span class="text-info"><strong>Ops! Você está abaixo do peso.</strong></span> Seu IMC é: ' + bmi + ' </p>').fadeIn();
        } else {
            result.html('<div class="xs-icon xs-green-bg"><spna class="icon icon-thumbs-up"></spna></div><p style="color: #FFFFFF"> <span class="xs-green-color"><strong>Legal! Você é saudável.</strong></span> Seu IMC é: ' + bmi + ' </p>').fadeIn();
        }
    }
});