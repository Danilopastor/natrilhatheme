<div id="initialpage">
    <div class="initial_grid">
        <div class="initial_row services_area" style="background-image:url('<?php bloginfo('template_directory'); ?>/assets/image/keyboard-338502_1920.jpg')" >
            <div class="content_area">
                <div class="inner_content">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/image/initial_logo.svg" />
                    <h1>produções de conteúdo digital</h1>
                    <p>Temos a solução completa em conteúdo digital, áudio, podcast, video, sites. Entre e confira nossos serviços</p>
                    <button id="services">Saiba Mais</button>
                </div>
            </div>
        </div>
        <div class="initial_row podcast_area">
            <div class="content_area">
                <div class="header_podcast_area"  style="background-image:url('<?php bloginfo('template_directory'); ?>/assets/image/montain_podcast_area.jpg')">
                   <div class="inner">
                       <img src="<?php bloginfo('template_directory'); ?>/assets/image/initial_logo_podcast_area.svg" />
                       <p>Atividades e esportes outdoor, Turismo e Saúde. Entre e ouça todos os episódios.</p>
                       <button id="podcast">
                           <div class="btn_play">
                              <i class="fas fa-play"></i>
                           </div>
                           <p>Ouça Agora</p>
                       </button>
                   </div>
                </div><!-- header_podcast_area -->
                <div class="footer_podcast_area">
                    <div class="inner">
                        <h1>Entre em contato e vamos avançar sua idéia. Esperamos você!</h1>
                        <div class="separator"></div>
                        <div class="social_icons">

                            <a target="_blank" href="https://twitter.com/natrilhapc">
                                <div class="col_social">
                                <i class="fab fa-twitter"></i>
                                <p>/natrilhapc</p>
                                </div>
                            </a>

                            <a target="_blank" href="https://instagram.com/natrilhapc">
                                <div class="col_social">
                                <i class="fab fa-instagram"></i>
                                <p>/natrilhapc</p>
                                </div>
                            </a>

                            <a target="_blank" href="https://t.me/natrilhapc">
                                <div class="col_social">
                                <i class="fab fa-telegram"></i>
                                <p>/natrilhapc</p>
                                </div>
                            </a>

                        </div>
                        <p class="final_footer">Copyright © 2020 - design by Nativa Multimídia</p>
                    </div>
                </div><!-- footer_podcast_area -->
            </div><!-- content_area -->
        </div>
    </div>
</div>
<script>
    const services = document.getElementById('services');
    const podcast = document.getElementById('podcast');

    function createCookie(name) {
    var expires;
        var date = new Date();
        date.setTime(date.getTime() + (3600 * 1000));
        expires = "; expires=" + date.toGMTString();

    document.cookie = name + "=" + "1" + expires + "; path=/";
    }

    services.addEventListener("click", function(){
        window.location.href = "https://vcnatrilha.com.br/servicos/";
    });
    podcast.addEventListener("click", function(){
        createCookie('natrilha_initial');
        location.reload();

    });
</script>