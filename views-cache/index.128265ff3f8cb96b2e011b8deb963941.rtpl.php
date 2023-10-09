<?php if(!class_exists('Rain\Tpl')){exit;}?><body>
    <div class="body">
        <div class="section first">
            <div class="content">
                <!-- Flickity HTML init -->
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "pageDots" : false}'>
                    <div class="gallery-cell">
                        <img src="res/site/img/img (1).jpg" alt="" srcset="">
                        <div class="gallery-action">
                            <a href="#">Comprar</a>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <img src="res/site/img/img (2).jpg" alt="" srcset="">
                        <div class="gallery-legend">
                            <h3>Produto bom</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic necessitatibus quidem
                                libero nesciunt laudantium ab ad esse reprehenderit earum, quisquam tempora? Provident
                                dolorem repellendus fuga dolorum eveniet natus sed placeat?</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <img src="res/site/img/img (3).jpg" alt="" srcset="">
                        <div class="gallery-legend">
                            <h3>Produto bom</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic necessitatibus quidem
                                libero nesciunt laudantium ab ad esse reprehenderit earum, quisquam tempora? Provident
                                dolorem repellendus fuga dolorum eveniet natus sed placeat?</p>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <img src="res/site/img/img (4).jpg" alt="" srcset="">
                        <div class="gallery-legend">
                            <h3>Produto bom</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic necessitatibus quidem
                                libero nesciunt laudantium ab t?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section second">
            <div class="content">
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "pageDots" : false}'>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Rastreie seu pedido</span><i
                                class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Frete grátis</span><i
                                class="cell-item-ico fas fa-truck-fast"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Devolução fácil</span><i
                                class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Lista de desejos</span><i
                                class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Pagamento seguro</span><i
                                class="cell-item-ico fas fa-box-archive"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Garantia</span><i class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Suporte</span><i class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">SAC</span><i class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">Satisfação</span><i class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="cell-item">
                            <span class="cell-item-title">+10x sem juros</span><i
                                class="cell-item-ico fas fa-box-open"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="section third">
            <div class="content">
                <div class="grid flex-wrap">
                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                    <div class="grid-item four-of-100">
                        <div class="card">
                            <div class="card-top">
                                <img class="card-img" src="<?php echo htmlspecialchars( $value1["photoone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" srcset="">
                                <div class="card-img-button"><i class="fas fa-heart"></i></div>
                            </div>
                            <div class="card-middle">
                                <div class="card-legend">
                                    <p><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <legend class="card-bottom-title"></legend>
                                <button class="card-bottom-action">
                                    <a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Veja mais <i class="fas fa-eye"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="section fourth">
            <div class="content">
                <div class="title">
                    <span>Tudo para o seu Caminhão</span><i class="fas fa-check"></i>
                </div>
                <div class="grid flex-colum">
                    <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>

                    <div class="grid-item ten-of-100">
                        <a class="item" href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <img src="<?php echo htmlspecialchars( $value1["photocategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" srcset="">
                            <div class="span"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="section fifth">
            <div class="content">
                <div class="grid flex-wrap">
                    <div class="card-image">
                        <img src="res/site/img/card.jpeg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card2.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card3.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card4.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card5.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card6.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card7.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                    <div class="card-image">
                        <img src="res/site/img/card8.jpg" alt="" class="img">
                        <div class="card-image-legend">
                            <h3 class="card-image-legend-title">VOLVO H3</h3>
                            <p class="card-image-legend-content">
                                Robusto e conectado, o Volvo FH vai te levar ainda mais longe. Mais inteligente,
                                econômico e seguro do que nunca,
                                garante alta produtividade e rentabilidade, com total conforto.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>