
<div>
    <h2>Расчет необходимых сил и средств для тушения пожаров и проведения АСР по двум наиболее сложным вариантам развития возможного пожара</h2>
    <h3>Тактический замысел №2</h3>
    <p>Согласно справочных данных:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>Время до сообщения о пожаре: t <sub>сооб.</sub> =</span></td>
                    <td class="border-top-0">
                        <input class="form-control mb-3 w-75 d-inline-block mr-1"  type="text" name="time-massage-var2"><span>мин</span>
                    </td>
                </tr>
            </table>       
        </div>
    </div>
    <label>Маршрут следования осуществляется по улицам: </label>
    <div class="form-row">
        <div class="form-group ">
            <textarea type="text" class="form-control " rows="3" cols="80" name="street-var2"></textarea>
        </div>
    </div>

    <h3 class="mb-5">Расчёт сил и средств</h3>
    <h4>Тактический замысел №1</h4>

    <h4>1. Определим время свободного развития пожара на момент прибытия ПСЧ №4 </h4>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>t<sub>д.с</sub> =</span></td>
                    <td class="border-top-0">
                        <input class="form-control d-inline-block " type="text" name="formula_t_ds-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>
                </tr>

                <tr>
                    <td class="border-top-0"><span>t<sub>сб.</sub> =</span></td>
                    <td class="border-top-0"> 
                    <input class="form-control  d-inline-block " type="text" name="formula_t_sb-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-+]?\d+)?">
                    </td>
                </tr>

                <tr>
                    <td class="border-top-0"><span>t<sub>бр1.</sub> =</span></td>
                    <td class="border-top-0">
                        <input class="form-control d-inline-block " type="text" class="ml-1" name="formula_t_br1-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-+]?\d+)?">
                    </td>
                </tr>

                <tr>
                    <td class="border-top-0"><span>L =</span></td>
                    <td class="border-top-0">
                        <input type="text" class="form-control d-inline-block " name="formula_L-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-+]?\d+)?">
                    </td>
                </tr>

                <tr>
                    <td class="border-top-0"><span>V<sub>сл.</sub> =</span></td>
                    <td class="border-top-0">
                        <input class="form-control d-inline-block " type="text" name="formula_Vsl-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-+]?\d+)?">
                    </td>
                </tr>                    
            </table>
        </div>
    </div>


        <h4>2. Определим радиус пожара к моменту подачи стволов на тушение пожара</h4> 
        <div class="form-row">
            <div class="form-group ">
                <table class="table table-lg">
                    <tr>
                        <td class="border-top-0"><span>V<sub>л</sub> =</span></td>
                        <td class="border-top-0">
                            <input type="text" class="form-control d-inline-block " name="formula_Vl-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>                    
                </table>
            </div>
        </div>

        <h4>3. Определим площадь пожара </h4>
        <div class="form-row">
            <div class="form-group ">
                <table class="table table-lg">
                    <tr>
                        <td class="border-top-0"><span>Длина помещения =</span></td>
                        <td class="border-top-0">
                            <input type="text" name="formula_a_length-var2" class="form-control d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span>Ширинa помещения =</span></td>
                        <td class="border-top-0">
                            <input type="text" name="formula_a_wight-var2" class="form-control  d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-+]?\d+)?">
                        </td>
                    </tr>
                </table>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" class="form-control" type="radio" name="gridRadios"  value="circle-var2" checked>
                        <label class="form-check-label" class="form-control" >
                            Круг
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  class="form-control"name="gridRadios"  value="semicircle-var2">
                        <label class="form-check-label" >
                            Полукруг
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" class="form-control" type="radio" name="gridRadios"  value="angle-var2">
                        <label class="form-check-label">
                            Угол
                        </label>
                    </div>
                </div> 
            </div>  
        </div>
            
    <h4>4. Определим площадь тушения пожара </h4>
    <p>Количество направлений подачи стволов: </p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>n =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_n-var2"  class="form-control d-inline-block" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>      
                </tr>
            </table>  
        </div>
    </div>
    <p>Глубина тушения ручными стволами:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>h<sub>t</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" class="form-control d-inline-block" name="formula_ht-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>      
                </tr>
            </table>  
        </div>
    </div>

    <h4>5. Определим требуемый расход воды на тушение пожара</h4>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>I<sub>тр</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" class="form-control  d-inline-block " name="formula_Itr-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>      
                </tr>
            </table>  
        </div>
    </div>


    <h4>6. Определим требуемое количество стволов на тушение пожара</h4>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <p>расход ствола: </p>
                    <td class="border-top-0"><span><p>q<sub>ств</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_q_stvB-var2" class="form-control d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>
                </tr>
            </table>       
        </div>
    </div>
    
    <h4>7. Определим фактический расход воды на тушение пожара</h4>
    <p>расход подаваемых стволов на тушение:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>q<sup>т</sup><sub>ст</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_qt_stB-var2" class="form-control d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">                                                
                    </td>
                </tr>
            </table>       
        </div>
    </div>


    <h4>8. Определим требуемое количество стволов для осуществления защитных действий, исходя из возможной обстановки на пожаре</h4>
    <div class="form-row">
        <div class="form-group ">
            <textarea type="text" class="form-control " rows="5" cols="80" name="countTrunk-var2"></textarea>
        </div>
    </div>
    <p>Количество стволов требуемых для защиты:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>N<sub>ст.з</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_Nst_z-var2"  class="form-control  d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>
                </tr>
            </table>       
        </div>
    </div>
    

    <h3>9. Определим фактический расход воды на защиту здания</h3>
    <p>Расход подаваемых стволов для защиты:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>q<sup>з</sup><sub>ст</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_Qz_stB-var2" class="form-control d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>
                </tr>
            </table>       
        </div>
    </div>
    

    <h3>10. Определим общий расход воды на тушение и защиту здания</h3>


    <h3>11. Проверим обеспеченность объекта водой для целей пожаротушения</h3>
    <div class="form-group group">  
        <div class="form-row">
            <div class="form-group ">     
                <textarea type="text" class="form-control " rows="5" cols="80"  name="facility_security-var2"> </textarea>
            </div>
        </div>
    </div>
    

    <h3>12. Определим требуемое количество машин с учетом использования насосов на полную тактическую возможность</h3>
    <div class="form-group group">  
        <div class="form-row">
            <div class="form-group "> 
                <textarea type="text" class="form-control " rows="5" cols="80" name="facility_security-var2"> </textarea>
            </div>
        </div>
    </div>   


   
    <h3>13. Определим предельное расстояние для подачи воды</h3>
    <p>Высота подъема местности:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>Z<sub>м</sub> =</span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_Zm-var2" class="form-control  d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>      
                </tr>
            </table>  
        </div>
    </div>
    <p>Высота подъема ствола:</p>
    <div class="form-row">
        <div class="form-group ">
            <table class="table table-lg">
                <tr>
                    <td class="border-top-0"><span>Z<sub>ст</sub> = </span></td>
                    <td class="border-top-0">
                        <input type="text" name="formula_Zst-var2" class="form-control d-inline-block " required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                    </td>      
                </tr>
            </table>  
        </div>
    </div>

    <h3>14. Определим запас огнетушащих веществ на нужды пожаротушения:</h3>
    <div class="form-group group">  
        <div class="form-row">
            <div class="form-group "> 
                <p>Вывод про запах огнетушащих веществ</p>
                <textarea class="form-control " rows="5" cols="80"  name = 'conclusion_supplyOfwater-var2' placeholder="вывод" > </textarea> 
            </div>
        </div>
    </div>               

    <h3>15. Определим необходимую численность личного состава:</h3>
    <div class="form-group group">  
        <div class="form-row">
            <div class="form-group ">
                <table class="table table-lg">
                    <tr>
                        <td class="border-top-0"><span>N<sub>гдзс.туш</sub> =</span></td>
                        <td class="border-top-0">
                            <input class="form-control  d-inline-block " type="text" name="formula_N_tush-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>гдзс.защ</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control d-inline-block " type="text" name="formula_N_zash-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>гдзс. поиск</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_N_search-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>рез. гдзс</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_Nrez_gdzs-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>кпп</sub> = </span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_N_kpp-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>пб</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_N_pb-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>разв</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_N_razv-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>

                    <tr>
                        <td class="border-top-0"><span>N<sub>связ</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control d-inline-block " type="text" name="formula_N_sv-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?" >
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="border-top-0"><span>N<sub>вод</sub> =</span></td>
                        <td class="border-top-0">
                        <input class="form-control  d-inline-block " type="text" name="formula_N_vod-var2"required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        
    <div class="form-group group">  
        <div class="form-row">
            <div class="form-group ">
                <h3><b>Вывод:</b></h3> <textarea class="form-control " rows="4" cols="90" name="conclusion-var2" required> </textarea> 
            </div>
        </div>
    </div>   
</div>
