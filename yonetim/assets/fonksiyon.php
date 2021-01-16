<?php ob_start();

	try{
	$baglanti = new PDO ("mysql:host=localhost; dbname=aracsatis; charset=utf8", "root", ""); 
	$baglanti -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch (PDOException $e){
		die( $e -> getMessege() );
	}
	

	class yonetim {

		function sorgum($vt, $sorgu, $tercih=0) {

			$al = $vt -> prepare($sorgu);
			$al -> execute();

			if($tercih == 1):
				return $al -> fetch();
			
			elseif ($tercih == 2):
				return $al;
			endif;
		}


		function siteayar ($baglanti) {
			
			$sonuc = self::sorgum($baglanti, "select * from ayarlar ", 1);

			if($_POST):
                
                $title = htmlspecialchars( $_POST["title"] );
                $metatitle = htmlspecialchars( $_POST["metatitle"] );
                $metadesc = htmlspecialchars( $_POST["metadesc"] );
                $metakey = htmlspecialchars( $_POST["metakey"] );
                $metaauthor = htmlspecialchars( $_POST["metaauthor"] );
                $metaowner = htmlspecialchars( $_POST["metaowner"] );
                $metacopy = htmlspecialchars( $_POST["metacopy"] );
                $logoyazisi = htmlspecialchars( $_POST["logoyazisi"] );
                $twit = htmlspecialchars( $_POST["twit"] );
                $face = htmlspecialchars( $_POST["face"] );
                $inst = htmlspecialchars( $_POST["inst"] );
                $telefonno = htmlspecialchars( $_POST["telefonno"] );
                $adres = htmlspecialchars( $_POST["adres"] );
                $mailadres = htmlspecialchars( $_POST["mailadres"] );
                $filobaslik = htmlspecialchars( $_POST["filobaslik"] );
                $yorumbaslik = htmlspecialchars( $_POST["yorumbaslik"] );
                $iletisimbaslik = htmlspecialchars( $_POST["iletisimbaslik"] );

                $guncelleme = $baglanti -> prepare("update ayarlar set title=?, metatitle=?, metadesc=?, metakey=?, metaauthor=?, metaowner=?, metacopy=?, logoyazisi=?, twit=?, face=?, inst=?, telefonno=?, adres=?, mailadres=?, filobaslik=?, yorumbaslik=?, iletisimbaslik=? ");
                
                $guncelleme -> bindParam(1, $title, PDO::PARAM_STR );
                $guncelleme -> bindParam(2, $metatitle, PDO::PARAM_STR );
                $guncelleme -> bindParam(3, $metadesc, PDO::PARAM_STR );
                $guncelleme -> bindParam(4, $metakey, PDO::PARAM_STR );
                $guncelleme -> bindParam(5, $metaauthor, PDO::PARAM_STR );
                $guncelleme -> bindParam(6, $metaowner, PDO::PARAM_STR );
                $guncelleme -> bindParam(7, $metacopy, PDO::PARAM_STR );
                $guncelleme -> bindParam(8, $logoyazisi, PDO::PARAM_STR );
                $guncelleme -> bindParam(9, $twit, PDO::PARAM_STR );
                $guncelleme -> bindParam(10, $face, PDO::PARAM_STR );
                $guncelleme -> bindParam(11, $inst, PDO::PARAM_STR );
                $guncelleme -> bindParam(12, $telefonno, PDO::PARAM_STR );
                $guncelleme -> bindParam(13, $adres, PDO::PARAM_STR );
                $guncelleme -> bindParam(14, $mailadres, PDO::PARAM_STR );
                $guncelleme -> bindParam(15, $filobaslik, PDO::PARAM_STR );
                $guncelleme -> bindParam(16, $yorumbaslik, PDO::PARAM_STR );
                $guncelleme -> bindParam(17, $iletisimbaslik, PDO::PARAM_STR );

                $guncelleme -> execute();
                echo ' <div class="alert alert-success mt-5" role="alert" >
                   <strong>Site Ayarları Basariyla güncellendi!</strong> 
                </div> ';

                header("refresh:2, url=control.php");

			//db islemleri

			else:
			?>
                    <form action="control.php?sayfa=siteayar" method="post">

                        <div class="row ">
                            <div class="col-lg-7 mx-auto mt-2 ">
                            <h3 class="text-info">SİTE AYARLARI  </h3>
                            </div>

                            <!-- TİTLE -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Title</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- METATİTLE -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Title</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc["metatitle"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- METADESC -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Description</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"]; ?>" />
                                    </div>

                                </div>
                            </div>
                            <!-- METAKEY -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Key</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- METAAUTHOR -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Author</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metaauthor" class="form-control" value="<?php echo $sonuc["metaauthor"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- METAOWNER -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Owner</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metaowner" class="form-control" value="<?php echo $sonuc["metaowner"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- METACOPY -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Meta Copy</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc["metacopy"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- LOGOYAZISI -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Logo Yazısı</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="logoyazisi" class="form-control" value="<?php echo $sonuc["logoyazisi"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- TWIT -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Twitter Bağlantısı</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- FACE -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Facebook  Bağlantısı</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="face" class="form-control" value="<?php echo $sonuc["face"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- INST -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Instagram  Bağlantısı</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="inst" class="form-control" value="<?php echo $sonuc["inst"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- TELEFONNO -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Telefon Numarası</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="telefonno" class="form-control" value="<?php echo $sonuc["telefonno"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- ADRES -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Adres Bilgisi</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="adres" class="form-control" value="<?php echo $sonuc["adres"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- MAILADRES -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Mail Adresi</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- FILOBASLIK -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Filo Başlık</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="filobaslik" class="form-control" value="<?php echo $sonuc["filobaslik"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- YORUMBASLIK -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Yorum Başlık</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="yorumbaslik" class="form-control" value="<?php echo $sonuc["yorumbaslik"]; ?>" />
                                    </div>

                                </div>
                            </div>

                            <!-- ILETISIMBASLIK -->
                            <div class="col-lg-7 mx-auto border">
                                <div class="row"> 
                                
                                    <div class="col-lg-3 border-right p-3 text-left">
                                    <span>Iletişim Başlık</span>
                                    </div>
                        
                                    <div class="col-lg-9 p-1">
                                    <input type="text" name="iletisimbaslik" class="form-control" value="<?php echo $sonuc["iletisimbaslik"]; ?>" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-7 mx-auto mt-2 border-bottom">
                            <input type="submit" name="buton" class="btn btn-info m-1" value="GÜNCELLE"  />
                            </div>

                    </form>


			<?php

			endif;
		}

        function sifrele($veri) {
            
            return base64_encode( gzdeflate( gzcompress( serialize($veri) ) ) );
        }

        function coz($veri) {
            
            return unserialize( gzuncompress( gzinflate( base64_decode($veri) ) ) ) ;

        }

        function kuladial($vt) {

            $cookid = $_COOKIE["kulbilgi"];
            $cozduk = self::coz($cookid);

            $sorgusonuc = self::sorgum($vt, "select * from yonetim where id=$cozduk ", 1 );
            return $sorgusonuc["kulad"];
        }


        function giriskontrol($kulad, $sifre, $vt){
            
            $sifrelihal = md5(sha1(md5($sifre)));

            $sor = $vt -> prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'"); 
            $sor -> execute();

            if ( $sor->rowCount() == 0 ):
                echo '<div class="alert alert-danger mt-5 col-md-5 mx-auto ">Hatalı Giriş !</div>' ;
                header("refresh:2, url=index.php");

            else :
                $gelendeger = $sor -> fetch();
                $sor=$vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'"); 
                $sor->execute();
                echo '<div class="alert alert-success mt-5 col-md-5 mx-auto ">Giriş Başarılı</div>' ;
                header("refresh:2, url=control.php");

                $id = self::sifrele( $gelendeger["id"] );
                setcookie("kulbilgi", $id, time() + 60*60*24 );

            endif;
        }

        function cikis($vt) {

            $cookid = $_COOKIE["kulbilgi"];
            $cozduk = self::coz($cookid);

            self::sorgum($vt, "update yonetim set aktif=0 where id=$cozduk ", 0);
            setcookie("kulbilgi", $cookid, time() - 1);

            echo '<div class="alert alert-success mt-5 col-md-5 mx-auto ">Çıkış Başarılı</div>' ;
            header("refresh:2, url=index.php");
        }

        function kontrolet($sayfa) {

            if( isset($_COOKIE["kulbilgi"]) ):
                if( $sayfa=="ind" ) : header("Location:control.php"); endif;
             
            else:
               if( $sayfa=="cot" ) : header("Location:index.php"); endif;
                
            endif;
        }

        //-----İNTRO KISMI FONK---------
        function introayar($vt) {

            echo '<div class="row text-center">
            <div class="col-lg-12 border-bottom"><h3 class="float-left mt-2 text-info">İNTRO GÖRSELLERİ</h3><a href="control.php?sayfa=introresimekle" class="btn btn-success btn-sm m-2 float-right" >Yeni Görsel Ekle</a></div>';
            
            $introbilgiler = self::sorgum($vt, "select * from intro", 2);

            while( $sonbilgi = $introbilgiler -> fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4">
                    <div class="row border border-light p-1 m-1">
                        <div class="col-lg-12">
                        <img src="../'.$sonbilgi["photoPath"].'">
                        </div>

                        <div class="col-lg-6 text-right">
                        <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
                        </div>

                        <div class="col-lg-6 text-left">
                        <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="fa fa-close m-2 text-danger" style="font-size:25px;"></a>
                        </div>
                    </div>
                  </div>
            ';

            endwhile;

            echo '</div>';
        }

        function introresimekleme ($vt) {
            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            if($_POST):
            
                if($_FILES["dosya"]["name"] == ""):
                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Bir Görsel Seçiniz.</div>';
                    header("refresh:2, url=control.php?sayfa=introresimekle" );

                    else:
                        if($_FILES["dosya"]["size"] > (1024*1024*5) ):
                            echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel Boyutu Çok Büyük.</div>';
                            header("refresh:2, url=control.php?sayfa=introresimekle" );

                            else:
                                $izinverilen = array("image/png", "image/jpeg");

                                if( !in_array($_FILES["dosya"]["type"], $izinverilen) ):
                                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel İzin Verilen Formatta Değil.</div>';
                                    header("refresh:2, url=control.php?sayfa=introresimekle" );

                                    else:
                                        $görselyol = '../img/carousel/'.$_FILES["dosya"]["name"];
                                        move_uploaded_file( $_FILES["dosya"]["tmp_name"], $görselyol);
                                        echo '<div class="alert alert-success mt-1">Görsel Başarıyla Yüklendi.</div>';
                                        header("refresh:2, url=control.php?sayfa=introayar" );
                                        $görselyol2 = str_replace('../', '', $görselyol);
                                        $kayitekle = self::sorgum($vt, "insert into intro (photoPath) VALUES('$görselyol2')", 0);
                                endif;
                        endif;
                endif;


            else:
                ?>
                    <div class="col lg-4 mx-auto mt-2">
                        <div class="card card-bordered">
                            <div class="card-body">
                            <h5 class="title border-bottom">İntro Görsel Ekleme </h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <p class="card-text"> 
                                    <input type="file" name="dosya" />
                                </p>
                                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
                            </form>
                            <p class="card-text text-left text-danger border-top"> * Görsellerin (.jpg) veya (.png) uzantılı olması gerekmektedir. </br>
                                                                                   * Görsellerin boyutu 5mb aşmamalıdır.
                            </p> 
                            </div>
                        </div>
                    </div>
                <?php

            endif;
            echo '</div> 
            </div></div>';

        }

        function introsil ($vt) {

            $introid = $_GET["id"];
            $verial = self::sorgum($vt, "select * from intro where id='$introid' ", 1);


            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            //dosyadan silme
            unlink( "../".$verial["photoPath"]);

            //db silme
            self::sorgum($vt, "delete from intro where id='$introid' ", 0);

            echo '<div class="alert alert-success mt-1">Görsel Başarıyla Silindi</div>';
            echo '</div></div>';
            header("refresh:2, url=control.php?sayfa=introayar" );
        }

        function introresimguncelleme ($vt) {

            $gelenintroid = $_GET["id"];


            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            if($_POST):

            $formdangelenid = $_POST["introid"];
            
                if($_FILES["dosya"]["name"] == ""):
                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Bir Görsel Seçiniz.</div>';
                    header("refresh:2, url=control.php?sayfa=introayar" );

                    else:
                        if($_FILES["dosya"]["size"] > (1024*1024*5) ):
                            echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel Boyutu Çok Büyük.</div>';
                            header("refresh:2, url=control.php?sayfa=introayar" );

                            else:
                                $izinverilen = array("image/png", "image/jpeg");

                                if( !in_array($_FILES["dosya"]["type"], $izinverilen) ):
                                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel İzin Verilen Formatta Değil.</div>';
                                    header("refresh:2, url=control.php?sayfa=introayar" );

                                    else:
                                        
                                        $resimyolunabak = self::sorgum($vt, "select * from intro where id='$gelenintroid'", 1);
                                        $dbgelenyol = '../'.$resimyolunabak["photoPath"];
                                        unlink($dbgelenyol);


                                        $görselyol = '../img/carousel/'.$_FILES["dosya"]["name"];
                                        move_uploaded_file( $_FILES["dosya"]["tmp_name"], $görselyol);
                                        $görselyol2 = str_replace('../', '', $görselyol);
                                        self::sorgum($vt, "update intro set photoPath='$görselyol2' where id='$gelenintroid'", 0);


                                        echo '<div class="alert alert-success mt-1">Görsel Başarıyla Güncellendi.</div>';
                                        header("refresh:2, url=control.php?sayfa=introayar" );
                                        
                                endif;
                        endif;
                endif;


            else:
                ?>
                    <div class="col lg-4 mx-auto mt-2">
                        <div class="card card-bordered">
                            <div class="card-body">
                            <h5 class="title border-bottom">İntro Görsel Güncelleme </h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <p class="card-text"> 
                                    <input type="file" name="dosya" />
                                </p>
                                <p class="card-text"> 
                                    <input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"/>
                                </p>
                                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
                            </form>
                            <p class="card-text text-left text-danger border-top"> * Görsellerin (.jpg) veya (.png) uzantılı olması gerekmektedir. </br>
                                                                                   * Görsellerin boyutu 5mb aşmamalıdır.
                            </p> 
                            </div>
                        </div>
                    </div>
                <?php

            endif;
            echo '</div> 
            </div></div>';
        }


        //-----ARAÇ FİLOSU KISMI FONK------
        function filoayar($vt) {

            echo '<div class="row text-center">
            <div class="col-lg-12 border-bottom"><h3 class="float-left mt-2 text-info">ARAÇ FİLO GÖRSELLERİ</h3><a href="control.php?sayfa=filoayarekle" class="btn btn-success btn-sm m-2 float-right" >Yeni Görsel Ekle</a></div>';
            
            $introbilgiler = self::sorgum($vt, "select * from filomuz", 2);

            while( $sonbilgi = $introbilgiler -> fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4">
                    <div class="row border border-light p-1 m-1">
                        <div class="col-lg-12">
                        <img src="../'.$sonbilgi["photoPath"].'">
                        </div>

                        <div class="col-lg-6 text-right">
                        <a href="control.php?sayfa=filoayarguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
                        </div>

                        <div class="col-lg-6 text-left">
                        <a href="control.php?sayfa=filoayarsil&id='.$sonbilgi["id"].'" class="fa fa-close m-2 text-danger" style="font-size:25px;"></a>
                        </div>
                    </div>
                  </div>
            ';

            endwhile;

            echo '</div>';
        }

        function filoayarekleme ($vt) {
            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            if($_POST):
            
                if($_FILES["dosya"]["name"] == ""):
                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Bir Görsel Seçiniz.</div>';
                    header("refresh:2, url=control.php?sayfa=filoayarekle" );

                    else:
                        if($_FILES["dosya"]["size"] > (1024*1024*5) ):
                            echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel Boyutu Çok Büyük.</div>';
                            header("refresh:2, url=control.php?sayfa=filoayarekle" );

                            else:
                                $izinverilen = array("image/png", "image/jpeg");

                                if( !in_array($_FILES["dosya"]["type"], $izinverilen) ):
                                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel İzin Verilen Formatta Değil.</div>';
                                    header("refresh:2, url=control.php?sayfa=filoayarekle" );

                                    else:
                                        $görselyol = '../img/filo/'.$_FILES["dosya"]["name"];
                                        move_uploaded_file( $_FILES["dosya"]["tmp_name"], $görselyol);
                                        echo '<div class="alert alert-success mt-1">Görsel Başarıyla Yüklendi.</div>';
                                        header("refresh:2, url=control.php?sayfa=filoayar" );
                                        $görselyol2 = str_replace('../', '', $görselyol);
                                       self::sorgum($vt, "insert into filomuz (photoPath) VALUES('$görselyol2')", 0);
                                endif;
                        endif;
                endif;


            else:
                ?>
                    <div class="col lg-4 mx-auto mt-2">
                        <div class="card card-bordered">
                            <div class="card-body">
                            <h5 class="title border-bottom">Araç Filo Görsel Ekleme </h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <p class="card-text"> 
                                    <input type="file" name="dosya" />
                                </p>
                                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
                            </form>
                            <p class="card-text text-left text-danger border-top"> * Görsellerin (.jpg) veya (.png) uzantılı olması gerekmektedir. </br>
                                                                                   * Görsellerin boyutu 5mb aşmamalıdır.
                            </p> 
                            </div>
                        </div>
                    </div>
                <?php

            endif;
            echo '</div> 
            </div></div>';

        }

        function filoayarsil ($vt) {

            $introid = $_GET["id"];
            $verial = self::sorgum($vt, "select * from filomuz where id='$introid' ", 1);


            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            //dosyadan silme
            unlink( "../".$verial["photoPath"]);

            //db silme
            self::sorgum($vt, "delete from filomuz where id='$introid' ", 0);

            echo '<div class="alert alert-success mt-1">Görsel Başarıyla Silindi</div>';
            echo '</div></div>';
            header("refresh:2, url=control.php?sayfa=filoayar" );
        }

        function filoayarguncelleme ($vt) {

            $gelenintroid = $_GET["id"];


            echo '<div class="row text-center"> 
                  <div class="col-lg-12">
            ';

            if($_POST):

            $formdangelenid = $_POST["introid"];
            
                if($_FILES["dosya"]["name"] == ""):
                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Bir Görsel Seçiniz.</div>';
                    header("refresh:2, url=control.php?sayfa=filoayar" );

                    else:
                        if($_FILES["dosya"]["size"] > (1024*1024*5) ):
                            echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel Boyutu Çok Büyük.</div>';
                            header("refresh:2, url=control.php?sayfa=filoayar" );

                            else:
                                $izinverilen = array("image/png", "image/jpeg");

                                if( !in_array($_FILES["dosya"]["type"], $izinverilen) ):
                                    echo '<div class="alert alert-danger mt-1">Görsel Yüklenmedi! Görsel İzin Verilen Formatta Değil.</div>';
                                    header("refresh:2, url=control.php?sayfa=filoayar" );

                                    else:
                                        
                                        $resimyolunabak = self::sorgum($vt, "select * from filomuz where id='$gelenintroid'", 1);
                                        $dbgelenyol = '../'.$resimyolunabak["photoPath"];
                                        unlink($dbgelenyol);


                                        $görselyol = '../img/filo/'.$_FILES["dosya"]["name"];
                                        move_uploaded_file( $_FILES["dosya"]["tmp_name"], $görselyol);
                                        $görselyol2 = str_replace('../', '', $görselyol);
                                        self::sorgum($vt, "update filomuz set photoPath='$görselyol2' where id='$gelenintroid'", 0);


                                        echo '<div class="alert alert-success mt-1">Görsel Başarıyla Güncellendi.</div>';
                                        header("refresh:2, url=control.php?sayfa=filoayar" );
                                        
                                endif;
                        endif;
                endif;


            else:
                ?>
                    <div class="col lg-4 mx-auto mt-2">
                        <div class="card card-bordered">
                            <div class="card-body">
                            <h5 class="title border-bottom">Araç Filo Görsel Güncelleme </h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <p class="card-text"> 
                                    <input type="file" name="dosya" />
                                </p>
                                <p class="card-text"> 
                                    <input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"/>
                                </p>
                                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
                            </form>
                            <p class="card-text text-left text-danger border-top"> * Görsellerin (.jpg) veya (.png) uzantılı olması gerekmektedir. </br>
                                                                                   * Görsellerin boyutu 5mb aşmamalıdır.
                            </p> 
                            </div>
                        </div>
                    </div>
                <?php

            endif;
            echo '</div> 
            </div></div>';
        }


        //-----HAKKIMIZDA KISMI FONK------

        function hakkimizda($vt) {

            echo '<div class="row text-center">
            <div class="col-lg-12 border-bottom"><h3 class=" mt-2 text-info">HAKKIMIZDA AYARLARI</h3></div>';

            if (!$_POST) :

            
            
            $sonbilgi = self::sorgum($vt, "select * from hakkimizda", 1);

            echo '<div class="col-lg-6 mx-auto">
                    <div class="row card-bordered p-1 m-1">

                        <div class="col-lg-3 border-bottom bg-light">
                        Görsel
                        </div>
                        <div class="col-lg-9 border-bottom">
                        <img src="../'.$sonbilgi["resim"].'"></br>
                        <form action="" method="post" enctype="multipart/form-data" >
                        <input type="file" name="dosya" />
                        </div>


                        <div class="col-lg-3 border-bottom bg-light pt-3">
                        Başlık
                        </div>
                        <div class="col-lg-9 border-bottom">
                        <input type="text" name="baslik" class="form-control m-2" value="'.$sonbilgi["baslik"].'" />                        
                        </div>


                        <div class="col-lg-3 bg-light">
                        İçerik
                        </div>
                        <div class="col-lg-9">
                        <textarea name="icerik" class="form-control" rows="8">'.$sonbilgi["icerik"].'</textarea>
                        
                        </div>

                        <div class="col-lg-12 border-top">
                        <input type="submit" name="güncel" class="btn btn-primary m-2" value="Güncelle" />
                        </form>
                        </div>
 
            </div>';

            else:
                $resim = $_FILES["dosya"]["name"];
                $baslik = $_POST["baslik"];
                $icerik = $_POST["icerik"];


                            
                if(@$_FILES["dosya"]["name"] != ""):
                   
                    if($_FILES["dosya"]["size"] < (1024*1024*5) ):       
                            
                        $izinverilen = array("image/png", "image/jpeg");

                        if( in_array($_FILES["dosya"]["type"], $izinverilen) ):
                              
                            $görselyol = '../img/'.$_FILES["dosya"]["name"];
                            move_uploaded_file( $_FILES["dosya"]["tmp_name"], $görselyol);
                            $veritabaniicin = str_replace('../', '', $görselyol);
                        endif;
                    endif;
                endif;

                
                if(@$_FILES["dosya"]["name"] != ""):
                    self::sorgum($vt, "update hakkimizda set baslik='$baslik', icerik='$icerik', resim='$veritabaniicin' ", 0);
                    echo '<div class="col-lg-6 mx-auto">
                        <div class="alert alert-success mt-5">Güncelleme Başarılı.</div>
                        </div>';
                    header("refresh:2, url=control.php?sayfa=hakkimizayar" );
                else:
                    self::sorgum($vt, "update hakkimizda set baslik='$baslik', icerik='$icerik' ", 0);
                     echo '<div class="col-lg-6 mx-auto">
                        <div class="alert alert-success mt-5">Güncelleme Başarılı.</div>
                        </div>';
                     header("refresh:2, url=control.php?sayfa=hakkimizayar" );
                endif;

                

            echo '</div>';
            endif;
        }






	}


?>