<div>
    <h2>ПРОГНОЗ РАЗВИТИЯ ПОЖАРА</h2> 
    <div class="row">
        <div class="col-md-12 mb-3">   
            <h3>Вариант 1 </h3>
            <div class="row">
                <div class="col-md-6">
                    <textarea type="text" name="variant-1" class="form-control"  rows="6" cols="140"></textarea>
                </div>
            </div>
        </div>    
        <div class="col-md-6 mb-3"> 
            <p>Линейная скорость горения: V<sub>мин</sub> 
            <input class="form-control mb-3 w-75 d-inline-block mr-1" type="text" name="linear-velocity-var1" cols="5" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?"> м/мин</p>
        </div> 
        <div class="mb-3 col-md-6">     
            <p>Интенсивность, подачи воды: I <input type="text" class="form-control w-75 d-inline-block mr-1" name="intensity-var1" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?">  л/(м<sup>2</sup>/с)</p>
        </div> 
        <div class="col-md-12 mb-3">
            <h3>Вариант 2 </h3>
            <div class="row">
                <div class="col-md-6">
                    <textarea type="text" name="variant-2" class="form-control"  rows="6" cols="140"></textarea>
                </div>
            </div>     
        </div>
        <div class="mb-3 col-md-6">    
            <p>Линейная скорость горения: V<sub>мин</sub>  
            <input class="form-control mb-3 w-75 d-inline-block mr-1" type="text" name="linear-velocity-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?"> м/мин</p>
        </div>
        <div class="mb-3 col-md-6">  
            <p>Интенсивность, подачи воды: I 
            <input class="form-control  w-75 d-inline-block mr-1" type="text" name="intensity-var2" required pattern="-?(\d+|\d+.\d+|.\d+)([eE][-]?\d+)?"> л/(м<sup>2</sup>/с)</p>
        </div>
        <div class="col-md-6 mb-3">  
            <label class="mt-8">Пути возможного распространения пожара </label>
            <textarea class="form-control mt-3"  rows="6" cols="140" type="text" name="fire-propagation-routes"></textarea>
        </div>
        <div class="col-md-6 mb-3"> 
            <label>Возможные зоны задымления и прогнозируемая концентрация продуктов горения</label>
            <textarea class="form-control mb-3"  rows="6" cols="140" type="text" name="possible-smoke-zones"></textarea>
        </div>
    </div>
</div>