<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="body">
  <div class="product-first">
    <div class="product-first-left">
      <div class="product-img">
        <div class="product-img-selector">
          <?php $counter1=-1;  if( isset($product_images) && ( is_array($product_images) || $product_images instanceof Traversable ) && sizeof($product_images) ) foreach( $product_images as $key1 => $value1 ){ $counter1++; ?>

          <div class="img-item">
            <img onmouseover="targetImage(this)" src="<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" />
          </div>
          <?php } ?>

        </div>
        <div class="product-img-selected">
          <img id="target" src="<?php echo htmlspecialchars( $product["photoone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" />
          <!-- <div class="product-img-share-button">
            <i class="fas fa-share-nodes"></i>
          </div> -->
        </div>
      </div>
    </div>
    <div class="product-first-right">
      <div class="product-evaluation" id="evaluation">
        <div class="star product-star-one 1" onmouseover="paintStars(this)">
          <i class="fas fa-star"></i>
        </div>
        <div class="star product-star-two 2" onmouseover="paintStars(this)">
          <i class="fas fa-star"></i>
        </div>
        <div class="star product-star-trhee 3" onmouseover="paintStars(this)">
          <i class="fas fa-star"></i>
        </div>
        <div class="star product-star-four 4" onmouseover="paintStars(this)">
          <i class="fas fa-star"></i>
        </div>
        <div class="star product-star-five 5" onmouseover="paintStars(this)">
          <i class="fas fa-star"></i>
        </div>
        <a href="#">(0 avaliações)</a>
      </div>
      <div class="product-title">
        <?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

      </div>
      <div class="product-pay">
        <div class="product-price">
          <div class="product-value">R$<?php echo formatPrice($product["vlprice"]); ?></div>
        </div>
        <div class="product-buy-actions">
          <a href="#" class="product-buy">Comprar <i class="fas fa-dollar-sign"></i></a>
          <a href="#" class="product-cart">Adicionar ao carrinho <i class="fas fa-cart-plus"></i></a>
        </div>
      </div>
      <div class="product-times-condition">
        <div class="credit-ico"><i class="fas fa-credit-card"></i></div>
        <div class="times-/result">
          <div class="time-value">R$ <?php echo formatPrice($product["vlprice"]); ?></div>
          <div class="time-total">
            à vista no cartao - ou <?php echo htmlspecialchars( $product["pricetimes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>x de R$
            <?php echo calcTimes($product["vlprice"],$product["pricetimes"]); ?> sem juros.
          </div>
        </div>
      </div>
      <div class="product-ship-calculator">
        <div class="ship-message">Calcule o frete e prazo de entrega</div>
        <div class="ship-actions">
          <input type="text" name="cep" id="cep" class="cep-input" maxlength="9" onkeyup="handleZipCode(event)" />
          <button class="cep-calc">
            Calcular <i class="fas fa-calculator"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="product-description">
      <h2 class="description-title">Descrição do produto</h2>

      <?php echo printRich($product["infoproduct"]); ?>

    </div>
  </div>
  <div class="product-second">
    <div class="product-second-title">
      <h3>Aproveite e compre junto</h3>
    </div>
    <div class="content">
      <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "pageDots" : false}'>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
        <div class="gallery-cell">
          <div class="card">
            <div class="card-top">
              <img class="card-img" src="/res/site/img/img (1).jpg" alt="" srcset="" />
            </div>
            <div class="card-middle">
              <div class="card-legend">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nulla at ipsum, aut libero
                </p>
              </div>
              <div class="card-pricing">
                <div class="card-value">R$ 254,00</div>
                <div class="card-times">
                  <div class="times">3x de</div>
                  <div class="times-value">R$ 96,25</div>
                </div>
              </div>
            </div>
            <div class="card-bottom">
              <button class="card-bottom-action">
                <a href="#">Adicionar ao carrinho<i class="fas fa-cart-plus"></i></a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const handleZipCode = (event) => {
  let input = event.target
  input.value = zipCodeMask(input.value)
}

const zipCodeMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{5})(\d)/,'$1-$2')
  return value
}
</script>