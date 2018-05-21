<?php

    // Encabezado de los HTMLs
    function Encabezado($value){
        $items = ["Home", "Biografía", "Discografía", "Filmografía", "Tienda"];
        $links = ["index.php?id=0", "index.php?id=1", "index.php?id=2", "index.php?id=3", "index.php?id=4"];
        echo <<<HTML
                        <!DOCTYPE html>
                        <!-- Ejemplo de página web -->
                        <html lang="es">   
                            <head>
HTML;
                                //Selecciono el titulo
                                echo "<title>Daft Punk | ".$items[$value]."</title>";
echo <<< HTML
                                <meta charset="utf-8">
                                <meta name="author" content="Fernando Talavera Mendoza">
                                <meta name="keywords" content="tecnologías web, html, programación">
                                <link rel="shortcut icon" href="./img/favicon.png" type="image/png">
                                <link rel="stylesheet" href="./estilo/style.css">
                            </head>
                            
                            <body>
                                <header>
                                    <img src="./img/horizontal.jpg" alt="Imagen horizontal" class="horizontal"/>
                                </header>
                            
                            <nav>
                                <img src="./img/logo.jpg" alt="Logo" class="logo"/>
                                <ul>
HTML;
                        // Genero el nav y activo el <a>
                        foreach ($items as $k => $v)
                            echo "<li".($k==$value?" class='activo'":"").">"."<a href='".$links[$k]."'>".$v."</a></li>";

        echo <<<HTML
                                    <li>
                                        <a href="index.php?login=0">Login</a>
                                    </li>
                                    <li>
                                        <a href="index.php?register=0">Register</a>
                                    </li>
                                </ul>
                            </nav>
HTML;
    }

    // Aside 
    function aside(){
        echo <<<HTML
            <aside>
                <form action="busqueda.php" method="POST">
                    <input type="text" name="discografia_search" placeholder="Buscar un disco, una canción o poner dos fechas"/>
                    <input type="submit" name="discografia_searchbutton" value="Enviar"/>
                </form>

                <form action="busqueda.php" method="POST">
                    <select name="conciertos_search" multiple>
                        
                    </select>
                    <br>
                    <input type="submit" name="conciertos_searchbutton" value="Enviar"/>
                </form>
            </aside>
HTML;
        /*  Edicion del archivo
            Busqueda
            Gestor de compras
        */
    }

    function select_fechatarjeta(){
        echo <<<HTML
                    Fecha de caducidad y código de seguridad: <br> <br>
HTML;
                    echo <<<HTML
                                <select name="mestarjeta">
                                    <option value="" selected>--</option>
HTML;
                                for($i = 1; $i <= 12; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                    </select> / 
HTML;
                    echo <<<HTML
                                <select name="aniotarjeta">
                                    <option value="" selected>----</option>
HTML;
                                for($i = 2018; $i <= 2029; $i++)
                                    echo '<option value="',$i,'">',$i,'</option>';

                    echo <<<HTML
                                </select>
                                <br> <br>
HTML;
    }

    // El contenido del main de cada página
    function content($value){
        switch($value){
            // Home
            case 0:
                echo <<<HTML
                    <main>
                        <article>
                            <h2>Home</h2>
                            
                            <section>
                                <h2 class="titulocuerpo">El grupo</h2>
                                <p>
                                    Daft Punk es un banda francesa (House) formada por Thomas Bangalter y Guy-Manuel De Homen Christo.
                                    <br> Famosos por sus cascos de robots futuristas y espectaculares conciertos en vivo, han lanzado varios
                                    <br> álbumnes pioneros e influyentes, así como el trabajo cinematográfico aclamado por la crítica.
                                    <br>
                                </p>
                            </section>
                        </article>
                        
                        <article>
                            <img src="./img/img1.jpg" width="350" height="200" alt="Giorgio y Daft Punk" class="imagen"/>
                            <img src="./img/img2.jpg" width="300" height="200" alt="Cascos" class="imagen"/>

                            <h2 class="titulocuerpo">Algunos Éxitos</h2>
                            <ul>
                                <li>Derezzed</li>
                                <li>Harder, Better, Faster, Stronger</li>
                                <li>Get Lucky</li>
                                <li>One More Time</li>
                                <li>Around The World</li>
                            </ul>
                        </article>
                        
                        <article class="articulos">
                            <h2 class="titulocuerpo" >Merchandise Oficial</h2>
                            <!-- img con la merchandising -->
                            <ul>
                                <li>
                                    <img src="./img/poster.jpg" width="200" height="300" alt="Poster" class="imagen"/> Poster
                                </li>
                                <li>
                                    <img src="./img/snowglobe.jpg" width="200" height="300" alt="SnowGlobe" class="imagen"/> Bola de nieve
                                </li>
                                <li>
                                    <img src="./img/puzzle.jpg" width="200" height="300" alt="Puzzle" class="imagen"/> Puzzle
                                </li>
                            </ul>
                        </article>
                    </main>
HTML;
            break;

            // Biografía
            case 1:
                echo <<<HTML
                    <main>
                        <article>
                            <h2>Biografía</h2>

                            <img src="./img/DaftAlive.jpeg" width="350" height="250" alt="Daft Alive" class="imagen"/>

                            <p>Daft Punk es un dúo de productores formado por los músicos franceses Guy-Manuel de Homem-Christo (n. 1974) y Thomas Bangalter
                            (n. 1975). Daft Punk alcanzó una gran popularidad en el estilo house a finales de la década de los 90 en Francia y continuó
                            con su éxito los años siguientes, usando el estilo synthpop. El dúo también es acreditado por la producción de canciones
                            que se consideran esenciales en el estilo french house.</p>
                            
                            <p>El acrónimo "Daft", presente en su primer DVD, proviene de las iniciales de "A Story about Dogs, Androids, Firemen and Tomatoes". Estas palabras reciben significado al dúo musical por su primera
                            canción «Da Funk» del año 1995 perteneciente al álbum Homework, dónde aparece un perro antropomorfo como protagonista en
                            el vídeo. Luego "Androids" por la aparición de robots bailando en el vídeo «Around the World» del año 1997 del álbum Homework.
                            "Fireman" (Bomberos en español) que aparecen en el video de «Burnin'» y "Tomatoes" por el vídeo «Revolution 909».</p>
                            
                            <ul>
                                <li>
                                    <img src="./img/Guy-Manuel.jpg" width="300" height="200" alt="Guy-Manuel" class="imagen"/> Guy-Manuel de Homem-Christo
                                </li>
                                <li>
                                    <img src="./img/Thomas.jpg" width="300" height="200" alt="Guy-Manuel" class="imagen"/> Thomas Bangalter
                                </li>
                            </ul>

                            <p>A principios de la carrera del grupo, los miembros de la banda estaban influidos por bandas como The Beach Boys y The Rolling Stones.
                            Bangalter y de Homem-Christo se encontraban originalmente en una banda llamada Darlin', que se disolvió después de un corto
                            periodo de tiempo, permitiendo a los dos experimentar con música por su cuenta. El dúo se convirtió en Daft Punk, y lanzaron
                            su aclamado álbum debut Homework en 1997. El segundo álbum, Discovery, lanzado en 2001, fue aún más exitoso, impulsado por
                            los sencillos «One More Time», «Digital Love» y «Harder, Better, Faster, Stronger». En marzo de 2005, el dúo lanzó el álbum
                            Human After All, recibiendo críticas mixtas. Sin embargo, «Robot Rock» y «Technologic» tuvieron éxito en el Reino Unido.
                            Daft Punk hizo una gira a lo largo de 2006 y 2007 y lanzó su álbum en vivo Alive 2007, el cual ganó un Grammy al Mejor Álbum
                            de Electrónica/Dance. El dúo compuso la música para la película Tron: Legacy y en 2010 lanzó el álbum de la banda sonora
                            de la película.</p>
                            
                            <p>Daft Punk es conocido por sus elaborados conciertos en los que incorporan efectos visuales, por el énfasis
                            que ponen en la historia y los componentes visuales de sus producciones musicales. También porque desde 2001 en sus actuaciones
                            o apariciones públicas aparecen disfrazados de robot. En muy raras ocasiones conceden entrevistas o aparecen en televisión.</p>
                            
                            <p>El dúo ha vendido más de 12 millones de álbumes, y más de 17 millones de sencillos.</p>
                        </article>

                        <article>
                            <h2>Influencias</h2>

                            <p>Bangalter y de Homem-Christo no tienen un estilo musical definido. Años antes de producir música electrónica como un dúo,
                            los dos declararon que tenían un gusto musical muy parecido, siendo algunos de sus artistas preferidos Elton John, Armand
                            Van Helden, MC5, The Rolling Stones, The Beach Boys y The Stooges. Su admiración compartida a bandas de rock llevó a la fundación
                            de su propio proyecto independiente: Darlin. Bangalter dijo que "Era tal vez una cosa más de adolescentes en ese momento.
                            Es como, ya sabes, todo el mundo quiere estar en una banda". Ellos se inspiraron en el rock y el acid house en el Reino Unido
                            durante la década de los 90. De Homem-Christo señaló Screamadelica de Primal Scream como un influyente trabajo, como el registro
                            de "poner todo junto" en términos de género.</p>

                            <img src="./img/Therolling.jpg" width="300" height="200" alt="The Rolling Stones" class="imagen"/>

                            <p>Las notas de Homework rinden homenaje a un gran número de artistas musicales y contiene una cita de Brian Wilson. Bangalter
                            dijo que "En la música de Brian Wilson tú puedes realmente sentir la belleza—que era muy espiritual. [...] También me gusta
                            Bob Marley."Cuando se le preguntó sobre el éxito del álbum debut de Daft Punk y la creciente popularidad de su género musical
                            asociado, Bangalter respondió, "antes de nosotros estaban Frankie Knuckles o Juan Atkins y así sucesivamente. Lo menos que
                            podemos hacer es rendir homenaje a aquellos que no se conocen y que han influido en la gente." La canción de Daft Punk «Teachers»
                            en Homework se refiere a varias influencias incluyendo a Romanthony y Todd Edwards. De Homem dijo que "Su música tuvo un
                            gran efecto en el mundo. El sonido de sus producciones—la compresión, el sonido del bombo y la voz de Romanthony, la emoción
                            y el alma es parte de como sonamos ahora."</p>

                            <p>Más tarde, Romanthony y Edwards colaboraron con Daft Punk en unas canciones para Discovery. Para el álbum, Daft Punk se centró
                            en nuevos estilos de la música electrónica. Una importante fuente de inspiración fue el sencillo de Aphex Twin titulado "Windowlicker",
                            el cual "ni fue una canción club ni una canción tranquila, sino una canción relajante", según Bangalter. El dúo también utiliza
                            equipo para recrear el sonido de un artista anterior. Como se ha señalado por de Homem-Christo, "En 'Digital Love' puedes
                            recibir un ambiente como de Supertramp", que se generó usando un piano eléctrico. Durante otra entrevista, de Homem-Christo
                            aclaró que "no hicimos una lista de artistas que nos gustan y copiar sus canciones".</p>

                            <p>Durante otra entrevista, Bangalter describió a Andy Warhol como una de las primeras influencias artísticas de Daft Punk.</p>

                            <h3>Daft Punk como influencia musica</h3>

                            <p>Daft Punk ha influenciado a varias bandas y artistas, entre los que destacan Gorillaz, David Guetta, Skrillex, Justice, Calvin
                            Harris, Deadmau5 y Zedd.</p>
                        </article>

                        <article>
                            <h2>Colaboraciones</h2>

                            <p>El dúo francés, ha colaborado con diferentes artistas, por lo menos en 4 ocasiones.</p>

                            <ul>
                                <li>
                                    2007: Stronger de Kanye West del álbum Graduation
                                </li>
                                <li>
                                    2014: Gust of Wind de Pharrell Williams del álbum G I R L
                                </li>
                                <li>
                                    2016: Starboy (canción) de The Weeknd del álbum Starboy
                                </li>
                                <li>
                                    2016: I Feel It Coming de The Weeknd del álbum Starboy
                                </li>
                            </ul>

                            <img src="./img/Theweeknd.jpg" alt="The Weeknd" class="imagen"/>
                        </article>
                    </main> 
HTML;
            break;

            // Discografía
            case 2:
                echo <<<HTML
                    <main>
                        <article>
                            <h2>Discografía</h2>

                            <img src="./img/evolution.jpg" width="500" height="600" alt="Evolucion del grupo" class="imagen"/>

                            <h2>Primeros años (1987-1993)</h2>
                            <p>Thomas Bangalter y Guy-Manuel de Homem-Christo se conocieron en Lycée Carnot, una escuela secundaria en París. Los dos se
                            hicieron buenos amigos y decidieron en 1992, iniciar una banda basada en la guitarra, llamada Darlin' en compañía de Laurent
                            Brancowitz. Bangalter y Homem-Christo tocaban bajo y guitarra, respectivamente, y Brancowitz tocaba la batería. El nombre
                            del trío provenía de la canción de The Beach Boys, del mismo nombre, la cual grabaron junto con una composición original,
                            y fue lanzada en un EP de Duophonic Records multiartista. Una reseña negativa por parte de la revista Melody Maker, describió
                            a las canciones de la banda como "daft punky thrash". Pero en vez de ignorar dicha reseña, los cantantes la encontraron interesante
                            y, de hecho, de ella surgió su nombre Daft Punk. Homen-Christo comentó: «Nos esforzamos demasiado en encontrar [el nombre]
                            'Darlin', y esto pasó tan rápido». Darlin' se disolvió después de lo sucedido, por lo que Brancowitz tomó la oportunidad
                            de estar con Phoenix;. Mientras tanto Bangalter y Homem-Christo formaron Daft Punk y empezaron a experimentar con cajas de
                            ritmos y con sintetizadores.</p>

                            <img src="./img/sincasco.jpg" width="350" height="250" alt="Los miembros sin casco" class="imagen"/>
                        </article>
                    </main>
HTML;
            break;

            // Filmografía
            case 3:
                echo <<<HTML
                    <main>
                        <article>
                            <h2>Filmografía</h2>
                            <ul>
                                <li>
                                    <img src="./img/daft.jpg" width="200" height="300" alt="D.A.F.T" class="imagen"/> <a href="./daft.html">D.A.F.T A Story About Dogs, Androids, Firemen and Tomatoes</a>
                                </li>
                                <li>
                                    <img src="./img/interstella-cover.jpg" width="200" height="300" alt="Interstella 5555" class="imagen"/> <a href="./interstella.html">Interstella 5555: The 5tory of the 5ecret 5tar 5ystem</a>
                                </li>
                                <li>
                                    <img src="./img/electroma.jpg" width="200" height="300" alt="Electroma" class="imagen"/> <a href="./electroma.html">Daft Punk’s Electroma</a>
                                </li>
                            </ul>
                        </article>
                    </main>
HTML;
            break;

            // Tienda
            case 4:
                echo <<<HTML
                    <main>
                        <article>
                            <h2>Tienda</h2>
                            
                            <!-- Añadir los albumes y el tipo de tarjeta y checkbox -->
                            <form action="index.php" method="POST">
                                <fieldset>
                                    <legend>Merchandise Oficial</legend>
                                    Álbumes: <br>
                                    <label><input type="checkbox" name="compra[]" value="homework"/> Homework</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="discovery"/> Discovery</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="human after all"/> Human After All</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="tron" /> Tron: Legacy</label> <br>
                                    <label><input type="checkbox" name="compra[]" value="ram"/> Random Access Memories</label> <br>
                                </fieldset>

                                <fieldset>
                                    <legend>Datos personales y dirección de facturización</legend>
                                        Nombre: <br>
                                        <input type="text" name="nombre"/> <br> <br>
                                        Apellidos: <br>
                                        <input type="text" name="apellidos"/> <br> <br>
                                        Email: <br>
                                        <input type="email" name="email"/> <br> <br>
                                        Teléfono: <br>
                                        <input type="tel" name="tlf"/> <br> <br>
                                        Código Postal: <br>
                                        <input type="number" name="cp"/> <br> <br>
                                </fieldset>

                                <fieldset>
                                    <legend>Método de pago</legend>
                                        Seleccione un método de pago: <br> <br>
                                        <label><input type="radio" name="metodopago" value="tarjeta"/> Tarjeta </label>
                                        <label><input type="radio" name="metodopago" value="contrareembolso"/> Contra-reembolso </label>
                                        <br> <br>
                                        
                                        Seleccione una tarjeta: <br>
                                        <label><input type="radio" name="tipotarjeta" value="paypal"/> Paypal</label>
                                        <label><input type="radio" name="tipotarjeta" value="visa"/> Visa</label>
                                        <label><input type="radio" name="tipotarjeta" value="mastercard"/> MasterCard</label>
                                        <label><input type="radio" name="tipotarjeta" value="americanexpress"/> American Express</label>
                                        <br> <br>

                                        Número de tarjeta: <br>
                                        <input type="number" name="numtarjeta"/> <br> <br>
HTML;
                                        select_fechatarjeta();
                    echo <<<HTML
                                        CVC: <input type="number" min="3" name="cvc"/> <br> <br>
                                </fieldset>
                            
                                <input type="submit" name="enviar" value="Enviar" /> <input type="reset" value="Limpiar formulario"/>
                            </form>
                        </article>
                    </main> 
HTML;
            break;
        }
        // Generar el formuliario de Login register 
    }

    // Footer
    function Footer(){
        echo <<<HTML
                            <footer>
                                <p><a>© 2018 Copyright</a> | <a>Website designed and built by Fernando Talavera </a> | <a>All right reserved</p>
                            </footer>
                        </body>
                    </html>
HTML;
    }
?>