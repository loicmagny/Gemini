<?php
include 'header.php';
?>
<ul class="nav nav-tabs search center-blocks">
  <li class="active"><a href="#product" data-toggle="tab">Rechecher un produit</a></li>
  <li><a href="#component" data-toggle="tab">Rechercher un composant</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="product">
    <div class="jumbotron">
      <h2 class="display-3">Rechercher un produit</h2>
      <form class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nom du produit</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputProductName" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="inputBrand" class="col-lg-2 control-label">Marque</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputBrand" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Type de produit</label>
            <div class="col-lg-10">
              <div class="radio">
                <label>
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Produit alimentaire
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Produit cosmétique
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Produit d'hygiène
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Produit pour la lessive
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                  Produit médical
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Annuler</button>
              <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="tab-pane fade in" id="component">
    <div class="jumbotron">
      <h2 class="display-3">Rechercher un composant</h2>
      <form class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nom du composant</label>
            <div class="col-lg-10">
              <input class="form-control" id="inputProductName" type="text">
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="select" class="col-lg-2 control-label">Selects</label>
              <div class="col-lg-10">
                <select class="form-control" id="select">
                  <option class="selected">Sélectionnez</option>
                  <option>Pertubateur endocrinien</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Peut être trouvé dans:</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                    <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                    Produit alimentaire
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                    Produit cosmétique
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                    Produit d'hygiène
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                    Produit pour la lessive
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                    Produit médical
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-primary">Rechercher</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <?php
    include 'footer.php';
    ?>
