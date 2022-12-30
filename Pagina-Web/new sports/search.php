<!DOCTYPE html>
<html>
    <head>
        <title>Resultados da pesquisa <?php echo $_GET['q']; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <link rel="shortcut icon" href="logo.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
        <link rel="shortcut icon" href="../favicon.ico"> 
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
            }
            body{
                font-family: sans-serif;
            }
            .main{
                position: relative;
            }
            .container{
                width: 1200px;
                margin: 0 auto;
            }
            .w300{
                width: 300px;
            }
            .w900{
                width: 900px;
            }
            .w300, .w900{
                padding-top: 10px;
            }
            .flex{
                display: flex;
            }
            .box{
                background: #fff;
                box-shadow: 0 0 3px #9e9e9e;
                border-radius: 3px;
                padding: 10px 0;
            }
            .row{
                padding: 0 10px;
            }
            .row a{
                display: flex;
                width: 100%;
                text-decoration: none;
                color: inherit;
            }
            .row img{
                width: 160px;
            }
            .row .desc h2{
                font-size: 1.1rem;
            }
            .row .desc span{
                font-size: 1.4rem;
                display: block;
                padding: 10px 0;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="lo"><img src="logo.png" height="150px"/></div>
        </header>
        <div id="divBusca">
        <img src="anuncios/lupa.png" height="30px" width="35px" alt="Buscar..."/>
        <input type="text" id="txtBusca" placeholder="Buscar..."/>
        <button id="btnBusca">Buscar</button>
        </div>
        <div id='cssmenu'>
            <ul>
                <li class=' last'><a href='menu principal.html'><span>Principal</span></a></li>
                <li class=' has-sub'><a href="blusas.html"><span>Blusas</span></a>
                <ul>
                    <li class='has-sub'><a href="Nacionais.html"><span>Nacionais</span></a>
                    </li>
                    <li class='has-sub'><a href="internacionais.html"><span>Internacionais</span></a>           
                    </li>
                <li class='has-sub'><a href="Seleções.html"><span>Seleções</span></a>  
                    </li>
                </ul>
                </li>
                <li class='has-sub'><a href="shorts.html"><span>Calções</span></a>
                <ul>
                    <li class='has-sub'><a href="calções nacio.htm"><span>Nacionais</span></a>
                    </li>
                    <li class='has-sub'><a href="calções inter.htm"><span>Internacionais</span></a>  
                    </li>
                <li class='has-sub'><a href="calções sele.htm"><span>Seleções</span></a>  
                    </li>
                </ul>
                <li class='has-sub'><a href="chuteiras.html"><span>Chuteiras</span></a>
                <ul>
                    <li class='has-sub'><a href="#"><span>+</span></a>
                <ul>
                <li class='last'><a href="kappa.html"><span>Kappa</span></a>  
                    </li>
                <li class='last'><a href="puma.html"><span>Puma</span></a>  
                    </li>
                <li class='last'><a href="penalty.html"><span>Penalty</span></a>  
                    </li>
                </ul>
                    </li>
                    <li class='has-sub'><a href="nike.html"><span>Nike</span></a>
                    </li>
                    <li class='has-sub'><a href="adidas.html"><span>Adidas</span></a>  
                    </li>
                <li class='has-sub'><a href="umbro.html"><span>Umbro</span></a>  
                </li>
                </ul>
            </li>
                <li class='has-sub'><a href="bolas.html"><span>Bolas</span></a>
                <ul>
                <li class='last'><a href="bope.html"><span>Penalty</span></a>  
                    </li>
                    <li class='has-sub'><a href="boni.html"><span>Nike</span></a>
                    </li>
                    <li class='has-sub'><a href="boad.html"><span>Adidas</span></a>  
                    </li>
                </li>
            </ul>
            </li>
                <li class='has-sub'><a href="agasalhos.html"><span>Agasalhos</span></a>
                <ul>
                <li class='last'><a href="agna.html"><span>Nacional</span></a>  
                    </li>
                <li class='last'><a href="agni.html"><span>Internacionais</span></a>  
                    </li>
                    <li class='has-sub'><a href="agse.html"><span>Seleções</span></a>
                    </li>
                </li>
            </ul>
            </li>
                <li class='last'><a href="contato.html"><span>Contato</span></a></li>
                <li class='last'><a href="formulario.html"><span>Cadastre-se</span></a></li>
            </ul>
        </div>
        <section class="main">
            <div class="container flex">
                <div class="w300">
                    <div class="row">
                        <h2>Resultados para <?php echo $_GET['q']; ?></h2>
                    </div>
                </div>
                <div class="w900">
                    <div class="box">
                        <?php
                            require_once 'conn.php';
                            $search = $_GET['q'];
                            $sql = "SELECT * FROM produtos WHERE nome LIKE '%$search%'";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($info as $data) {
                            ?>
                            <div class="row">
                                <a href="flamengo.html">
                                    <img src="blusas/<?php echo $data['img']; ?>">
                                    <div  class="desc">
                                        <h2><?php echo $data['nome']; ?></h2>
                                        <span>R$ <?php echo $data['preco']; ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php
                                }
                            }else{
                                ?>
                            <div class="row">
                                <h2 style="padding: 20px 10px;">Nenhum produto encontrado.</h2>
                            </div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <center>
        <footer id="myFooter">
          <div class="container">
              <div class="row">
                  <div class="travel">
                  <div class="col-sm-2">
                     <div class="infor"> <h5>Informações</h5></div>
                      <ul>
                          <li><a href="sobre a loja.html">Sobre a empresa</a></li>
                          <li><a href="politica de emtrega.html">Politica de emtrega</a></li>
                          <li><a href="politica de privacidade.html">Politica de privacidade, termos e condições</a></li>
                      </ul>
                  </div>
                  </div>
                  <div class="travel">
                  <div class="col-sm-2">
                      <div class="ser"><h5>Serviços ao cliente</h5></div>
                      <ul>
                        <br>
                          <li><a href="contato.html">Entre em contato</a></li>
                          <li><a href="solicitar devolçução.html">Solicitar devolução</a></li>
                      </ul>
                  </div>
                  </div>
                  <div class="travel">
                  <div class="col-sm-2">
                      <div class="outros"><h5>Outros serviços</h5></div>
                      <ul>
                        <br>
                        
                          <li><a href="Produtos por marca.html">Produtos por marca</a></li>
                          <li><a href="produtos em promoção.html">Produtos em promoção</a></li>
                      </ul>
                  </div>
                  </div>
              </div>
          </div>
          <div class="footer-copyright">
              <p>© New Sports 2018-2019 - São Benedito-CE - Bairro do Cruzeiro - CEP: 62370-000</p>
          </div>
      </footer>
                        </center>
  </body>
  
  </html>