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
                            <h3>SİTE AYARLARI  </h3>
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

        //-----İNTRO KISMI---------
        function introayar($vt) {

            echo '<div class="row text-center">
            <div class="col-lg-12 "><a href="control.php?sayfa=introresimekle" class="btn btn-success m-2" >Yeni Görsel Ekle</a></div>';
            
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



	}


?>