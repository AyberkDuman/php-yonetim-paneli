<?php
	try{

			$baglanti = new PDO ("mysql:host=localhost; dbname=aracsatis; charset=utf8", "root", ""); 
			$baglanti -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}catch (PDOException $e){
				die( $e -> getMessege() );
			}


class aracsatis {
	public $title, $metatitle , $metadesc, $metakey, $metaauthor, $metaowner, $metacopy, $logoyazisi, $twit, $face ,$inst, $telefonno, $adres,
	$mailadres, $filobaslik, $yorumbaslik, $referansbaslik, $iletisimbaslik ;


	function __construct(){

		try{

		$baglanti = new PDO ("mysql:host=localhost; dbname=aracsatis; charset=utf8", "root", ""); 
		$baglanti -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch (PDOException $e){
			die( $e -> getMessege() );
		}


		$ayarcek = $baglanti -> prepare ("select * from ayarlar");
		$ayarcek -> execute();
		$sorguson = $ayarcek -> fetch();

		$this -> title = $sorguson["title"] ;
		$this -> metatitle = $sorguson["metatitle"] ;
		$this -> metadesc = $sorguson["metadesc"] ;
		$this -> metakey = $sorguson["metakey"] ;
		$this -> metaauthor = $sorguson["metaauthor"] ;
		$this -> metaowner = $sorguson["metaowner"] ;
		$this -> metacopy = $sorguson["metacopy"] ;
		$this -> logoyazisi = $sorguson["logoyazisi"] ;
		$this -> twit = $sorguson["twit"] ;
		$this -> face = $sorguson["face"] ;
		$this -> inst = $sorguson["inst"] ;
		$this -> telefonno = $sorguson["telefonno"] ;
		$this -> adres = $sorguson["adres"] ;
		$this -> mailadres = $sorguson["mailadres"] ;
		$this -> filobaslik = $sorguson["filobaslik"] ;
		$this -> yorumbaslik = $sorguson["yorumbaslik"] ;
		$this -> referansbaslik = $sorguson["referansbaslik"] ;
		$this -> iletisimbaslik = $sorguson["iletisimbaslik"] ;
	}

	// İNTRO DB İŞLEMLERİ
	function introbak($baglanti){
		$introal = $baglanti -> prepare("select * from intro");
		$introal -> execute();

		while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

		echo '<div class="item" style="background-image:url('.$sonucum["photoPath"].');"></div>';


		endwhile;
	}

	// HAKKIMIZDA DB İŞLEMLERİ
	function hakkimizda($baglanti){
		$introal = $baglanti -> prepare("select * from hakkimizda");
		$introal -> execute();

		$sonucum = $introal->fetch();

		echo '<div class="row">
                    <div class="col-lg-6 hakkimizda-img">
                    <img src="'.$sonucum["resim"].'"  alt="'.$sonucum["resim"].'-Hakkında"/>
                    </div>
                
                    <div class="col-lg-6 content">
                    <h2>'.$sonucum["baslik"].'</h2>
                    <h3>'.$sonucum["icerik"].'</h3>
                    <h3>'.$sonucum["icerik"].'</h3>
                    </div>
                </div>';
	}

	//FİLO DB İŞLEMLERİ
	function filomuz($baglanti){
		$introal = $baglanti -> prepare("select * from filomuz");
		$introal -> execute();

		echo ' <div class="container">
                <div class="section-header">
                <h2> Araç Filomuz </h2>
                <p>'; echo $this ->filobaslik; echo '</p>
   		        </div>
            </div>
         
            <div class="container-fluid">
                <div class="row no-gutters">';

				while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

				echo'    <div class="col-lg-3 col-md-4">         
         	    <div class="filo-item wow fadeInUp">            
                <a href="'.$sonucum["photoPath"].'" class="filo-popup">
                <img src="'.$sonucum["photoPath"].'" alt="" />
                <div class="filo-overlay">
            
                </div>
                </a>
                </div>
                </div>';

				endwhile;

                echo'</div>
				</div>' ;

	}

	//YORUMLAR DB İŞLEMLERİ
	function yorumlar($baglanti){
		$introal = $baglanti -> prepare("select * from yorumlar");
		$introal -> execute();

		echo '<div class="section-header">
                <h2>Müşteri Yorumları</h2>
                <p>'; echo $this ->yorumbaslik; echo ' </p>
   		        </div>
         
                <div class="owl-carousel testimonials-carousel">';

				while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

				echo' <div class="testimonial-item">
                    <p>
                    <img src="img/sol.png" class="quote-sign-left" />
                    '.$sonucum["icerik"].'
                    <img src="img/sag.png" class="quote-sign-right" />
                    </p>
                    <img src="img/yorum.jpg" class="testimonial-img" alt="" />
                    <h3>'.$sonucum["isim"].'</h3>
                    
                </div>';

				endwhile;



         	        
		echo '</div>';
	}


}


?>