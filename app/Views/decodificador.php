<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css"/>
    <title>DECODIFICADOR</title>
</head>
<body>
    <div class="container">        
        <h1 class="container__title">Decodificador de mensajes cifrados</h1>
        <div class="container__alert-messages">
            <span id="UIMessage" class="isDisabled"></span>
        </div>
        <div id="containerForm" class="container__form">            
            <div class="form__buttons-container">
                <button id="addStage" class="form__button-add"></button>
                <button id="decodeButton" class="form__button">Decodificar</button>
            </div>            
        </div>
        <div class="container__stage-box">            
            <!-- <div class="stage-box__tag">
                <span class="tag__text">33,53,56</span>
                <button class="tag__button">X</button>
            </div>         -->            
        </div>
        <div class="container__text-result">
            <p><i id="resultMessage"></i></p>
        </div>
        <div class="container__table-result">
            <table class="table-result isDisabled">
                <thead>
                    <tr>
                        <td>Resultado</td>
                    </tr>
                </thead>
                <tbody id="tbodyResul">                    
                </tbody>                
            </table>
        </div>
    </div>
    <script src="public/js/script.js"></script>
</body>
</html>