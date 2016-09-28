/**
* jquery.formula.js
* @version: v1.0
* @author: Rafael Campana
*
* Created by Rafael Campana on 2016-04-19. Please report any bug at contato@rafaelcampana.com
*
* Copyright (c) 2016 Rafael Campana http://rafaelcampana.com
*
* The MIT License (http://www.opensource.org/licenses/mit-license.php)
*
* Permission is hereby granted, free of charge, to any person
* obtaining a copy of this software and associated documentation
* files (the "Software"), to deal in the Software without
* restriction, including without limitation the rights to use,
* copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the
* Software is furnished to do so, subject to the following
* conditions:
*
* The above copyright notice and this permission notice shall be
* included in all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
* EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
* OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
* NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
* HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
* WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
* FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
* OTHER DEALINGS IN THE SOFTWARE.
*/

$(function () {

    // looking for inputs with data-formula attribute
    $("input:text[data-formula]").each(function () {
        var formula = $(this).attr('data-formula');
        var camposEnvolvidos = formula.match(/#([_a-zA-Z0-9]){1,15}#/g); // procura todos campos no padr�o #CAMPO#
        var campoAtual = $(this);
        var formulaInicial = formula;

        $.each(camposEnvolvidos, function (key, nome) {
            var campoEnvolvido = $("[data-variavel ='" + nome.replace('#', '').replace('#', '') + "'")[0];//Nome da variavel envolvida
            if (!campoEnvolvido)
                return;

            $(campoEnvolvido).bind('input', function () {//faz bind de uma ou mais fun��es relacionadas
                var formulaFinal = formulaInicial;
                $.each(camposEnvolvidos, function (keycampo, nomeCampo) {
                    formulaFinal = formulaFinal.replace(nomeCampo, $("[data-variavel ='" + nomeCampo.replace('#', '').replace('#', '') + "'").val().replace(",", "."));
                });
                try {
                    if (camposEnvolvidos.length > 1)
                        campoAtual.val(eval(formulaFinal).toFixed(4));//Corrige erro da subtra��o de 0.3 - 0.1 = 0,1999999...
                    else
                        campoAtual.val(formulaFinal);

                    var mascara = campoAtual.attr("data-mask");

                    if (mascara != undefined && mascara != "" && campoAtual.mask != undefined) {//verifica se utiliza componente mascara
                        campoAtual.mask(mascara, {
                            translation: {
                                S: { pattern: /^\-/, optional: true },
                                9: { pattern: /[0-9]/ }
                            }
                        });

                    }
                    campoAtual.trigger('input');//Realiza chamada das a��es associadas � ele
                } catch (e) {
                    //alert ou 
                    campoAtual.val("0");
                }
            });
        });
    });

});
