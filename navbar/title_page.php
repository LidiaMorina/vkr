<div class="mt-3">
    <p>№ плана <input class="" name="id_document" type="text"></p>
    <div class="row">
        <div class="col-md-6 mt-3 ">
            <label >Утверждаю</label>
            <textarea name="claim" class="form-control"  rows="4" cols="120" placeholder="Руководитель организации" required></textarea> 
        </div>
        <div class="col-md-6 mt-3">
            <label >Утверждаю</label>
            <textarea  name="claim_2" class="form-control"  rows="4" cols="120" placeholder="Руководитель МЧС" required></textarea>
        </div>
        <div class="col-md-6 mt-3">    
            <p>План тушения пожара(наименование объекта)</p> 
            <textarea class="form-control " rows="4" cols="150" required type="text" name="fire_plan"></textarea>
        </div>
        <div class="col-md-2 mt-3">
            <h5><i class="fas fa-briefcase"></i>Должность</h5>        
            <input class="my-2" type="text" name="position" autocomplete="off" form="myform">
            <input type="text" name="position2" autocomplete="off" form="myform">
        </div>
        <div class="col-md-2 mt-3">
            <h5><i class="fas fa-phone-alt"></i>Телефон</h5>                 
            <input class="my-2" type="tel"  autocomplete="off" name="phone" form="myform">
            <input type="tel" name="phone2"  autocomplete="off" form="myform">
        </div>               
        <div class="col-md-6 mt-3">     
            <p>Ранг пожара<input class="form-control" type="text" required name="fire_rang" ></p>
        </div>
        <div class="col-md-6 mt-3">     
            <p>План тушения пожара составил<input class="form-control mb-3" type="text" required name="plan_compiller" ></p>
        </div>
    </div>        
</div>