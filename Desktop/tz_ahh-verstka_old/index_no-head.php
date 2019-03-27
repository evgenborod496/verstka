<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="Публикация виртуальных туров для дизайнеров интерьера. Бесплатно, без регистрации и рекламы." />
        <meta name="keywords" content="Интерьер, Панорама, 3д Макс, виртуальыне туры, 3ds, Max" />
        <meta name="viewport" content="width=1000">
        <meta charset="UTF-8" >
        <meta property="og:image" content="ex.jpg" />
        <meta property="og:title" content="Interior project publication" />
        <title>ArcHHolder</title>
        <link rel="shortcut icon" href="archholder.ico" type="image/x-icon">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
<!-- внизу image_scr для шеринга в соц-сетях -->		
        <link rel="image_src" href="http://archholder.com/33/pano.jpg" />
        <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
        <script>
            $(function () {
                $("#upload-field").change(function () {
                    $("#upload-form").submit();
                });
                var bar = $('.bar');
                var percent = $('.percent');
                var status = $('#status');
                $("#upload-form").ajaxForm({
                    beforeSend: function () {
                        $(".progress").css("display", 'block');
                        $(".upload-text").css("display", 'none');
                        $("#upload-field").css("display", 'none');
                        status.empty();
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    success: function (data) {
                        var id = parseInt(data, 10);
                        var percentVal = '100%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                        if (!isNaN(id)) {
                            location.href = "/" + data;
                        } else {
                            alert("Загрузить не удалось. Проверьте загружаемый файл, перезагрузите страницу и попробуйте снова.");
                        }
                    },
                    complete: function (xhr) {
                        status.html(xhr.responseText);
                    }
                });
                $("#send").click(function () {
                    $.ajax({
                        url: '/mailer.php',
                        data: $("#mail").serialize(),
                        type: 'post',
                        success: function () {
                            alert("Ваше мнение отправлено!")
                        }
                    });
                });
                $("#aaa").click(function () {
                    location.href = "/primer1";
                });
                $("#upload1").click(function () {
                    $("#upload-field").trigger('click');
                });


                // ТАБУЛЯЦИЯ в КОНТЕНТА
                $('.manual_content_item:first').show();
                $('.tabs_with_help_buttons li:first ').addClass('active');

                $('.tabs_with_help > .tabs_with_help_buttons li').click(function (event) {
                   $('.tabs_with_help > .tabs_with_help_buttons li').removeClass('active');
                   $(this).addClass('active');
                   $('.tabs_with_help[style="display: block;"] .manual_content_item').hide();
                   event.preventDefault();

                   var selectTab = $(this).find('a').attr('href');
                   $(selectTab).show();
                });
                // ТАБУЛЯЦИЯ КОНТЕНТА
                $('.tabs_with_help').hide();
                $('.tabs_with_help:first').show();
                $('.buttons_tabs li:first ').addClass('active');

                $('.buttons_tabs li').click(function (event) {
                    $('.buttons_tabs li').removeClass('active');
                    $(this).addClass('active');
                    $('.tabs_with_help').hide();
                   event.preventDefault();

                   var selectTabB = $(this).find('a').attr('href');
                   $(selectTabB).fadeIn();
                });
            });
        </script>
    </head>
    <body>
        <iframe id="pano" scrolling="no" style="position:relative;height:675px;min-width:900px;" src="primer/iframe.html" width="100%" height="100%" frameborder="0"></iframe>
		<div class="header">
			<div class="logo">			
				<img src="logo_archholder_white.svg" alt="logo">
				<div class="text_only_logo">сервис для архитекторов и визуализаторов</div>
			</div>
			<div class="text_only_main_page">
        		<p><span></span>Бесплатный и удобный сервис для публикации панорам и виртуальных туров. Это современный и удобный способ визуализации и показа проектов интерьера заказчикам. Здесь нет рекламы, а ваш проект не удаляется и остается доступным для Вас и Вашего заказчика.</p>
				<p><span></span>Зарегистрированным пользователям доступен расширенный функционал.</p>
        	</div>
        </div>
        <div class="text_only_main_page_reg_button">
        	<a href="registr.php">
        		<div class="text_title_reg_button">РЕГИСТРАЦИЯ ОТКРЫТА</div>
        		<p>зачем регистрироваться?</p>
        	</a>
        </div>
        <div id="container"></div>
        <main>
            <div class="buttons">
                <a href="/primer" class="text_button_example btn grey">ПОСМОТРЕТЬ ПРИМЕР</a>
                <form enctype="multipart/form-data" method="post" action="iu/uploader.php" id="upload-form">
                    <div class="text_button_upload" id="upload1">ЗАГРУЗИТЬ ПАНОРАМУ</div>
                    <input type="file" name="image" id="upload-field"/>
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                </form>
            </div>
            <div class="text_small">Разрешение присылаемых jpg-файла до 7000x3500px и не более 20mb. <br/>
                Мы обязуемся не удалять Ваши работы! 
            </div>
            <ul class="buttons_tabs">
                <li class="active">
                    <h1>
                        <a href="#3dsMax">Как сделать панорамый кадр в 3dsMax?</a>
                    </h1>
                </li>
                <li>
                    <h1>
                        <a href="#SketchUp">Как сделать панораму с помощью SketchUp и VRay?</a>
                    </h1>
                </li>
                <li>
                    <h1>
                        <a href="#WHY">Почему панорамы удобнее обычной визуализации?</a>
                    </h1>
                </li>
            </ul>
            <div class="manual_container">
                <div class="tabs_with_help" id="3dsMax">
                   <ul class="tabs_with_help_buttons clearfix">
                       <li><a href="#manual_1"><h3>С помощью Vray:</h3></a></li>
                       <li><a href="#manual_2"><h3>С помощью Corona-Renderer:</h3></a></li>
                       <li><a href="#manual_3"><h3>С помощью <span>Iray, MentalRay и др:</span></h3></a></li>
                   </ul>
                  <div class="manual_content">
                      <div class="manual_content_item" id="manual_1">
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                          <div class="manual_item_first">
                              <span class="text_number_manual">1</span>
                              <div class="text_manual_item_first">
                                  <p><span class="indent_paragraph"></span>Создайте камеру и разместите ее так чтобы высота камеры и точка в которую вы смотрите находились на одной высоте (на уровне человеческого глаза). Настройки камеры не важны
								  </p>
                                  <p><span class="indent_paragraph"></span>Для создания виртуального тура вы можете использовать любую камеру, но если вы работаете с VrayPhysicalCamera, то в закладке vigneting уберите галочку
								  </p>
                              </div>
                              <div class="manual_item_first_photo">
                                  <img src="images/tutor-main_3dmax_camera-hight.png" alt="photo" />
                                  <div class="text_italic">
                                      <p><span class="indent_paragraph"></span>Камера имеет встроенную регулировку угла обзора, но она не является сферической и макс- имальный угол обзора, который возможно там установить, не превышает 175 градусов. Для обхода этого ограничения V-Ray имеет специальный инструмент, расширяющий возможности стандартной камеры. Все изменения, сделанные с помощью этого инструмента не отображаются во вьюпорте 3ds Max и будут видны непосредственно на визуализации.</p>
                                  </div>
                              </div>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">2</span>
                             <div class="manual_text_position_left_long">
                                  <p>
                                     <span class="indent_paragraph"></span>Переходим в окно Render Scene: (F10). Здесь следует найти закладку V-Rray: Camera. В разделе Camera type в выпадающем списке Type выбрать тип камеры Spherical. Таким образом, камера станет сферической. После, необходимо активировать функцию Override FOV, установив напротив нее галочку для подмены угла обзора и установить в поле FOV необходимое значение подмены угла обзора в 360 градусов. 
                                 </p>
                             </div>
                              <img src="images/tutor-main_3dmax-vray2.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                     <span class="indent_paragraph"></span>Чтобы получить корректное изображение проекции следует установить соотношение сторон 2:1 для финальной визуализации. Для этого необходимо перейти к закладке Common диалогового окна Render Scene: (F10) и в разделе Output Size выставить значение параметра Image Aspect равным 2.
                                  </p>
                              </div>
                              <img src="images/tutor-main_3dmax-vray3.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_short">
                                  <p><span class="indent_paragraph"></span>Для просмотра в виде виртуального тура, воспользуйтесь кнопкой "загрузить панораму". Разрешение присылаемых jpg-файлов, не должно быть более 8000х4000px и не более 20мб.
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Если использовали для обработки фотошоп, сохраняйте картинк у progressive-jpg c качеством 6-8. Качество останется таким же, а скорость загрузки существенноо уменьшится
								  </p>
                                  <p><span class="indent_paragraph"></span>Для удобной постобработки визуализации, удобно отрендерить дополнительные маски, которые дадут возможность выделять предметы, материалы, корректировать освещение, создавая новые варианты для вашего заказчика без дополнительных перерасчетов
								  </p>
								  <br><br>
                                  <p><span class="indent_paragraph"></span>Подробнее...
								  </p>
								</div>
                              <img src="images/tutor-main_3dmax-vray4-1.png" alt="screen" />
                              <img src="images/tutor-main_3dmax-vray4-2.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                      </div>
					  
                      <div class="manual_content_item" id="manual_2">
 <!--                         <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a> -->
                          <div class="manual_item">
                              <span class="text_number_manual">1</span>
                              <div class="manual_text_position_left_long">
                                  <p><span class="indent_paragraph"></span>Создайте камеру и разместите ее так чтобы высота камеры и точка в которую вы смотрите находились на одной высоте (на уровне человеческого глаза)
								  </p>
								  <br><br>
								  <p><span class="indent_paragraph"></span>Примените  к камере модификатор CoronaCameraMod. Во вкладке Camera Projection поставьте галочку Override и выберите Spherical
								  </p>
                              </div>
                              <img src="images/tutor-main_3dmax-corona1.png" alt="screen" />
                              <div class="clear"></div><br><br>
						  </div>
						  
                          <div class="manual_item">
                              <span class="text_number_manual">2</span>
                              <div class="manual_text_position_left_long">
                                  <p><span class="indent_paragraph"></span>Чтобы получить корректное изображение проекции следует установить соотношение сторон 2:1 для финальной визуализации. Для этого необходимо перейти к закладке Common диалогового окна Render Scene: (F10) и в разделе Output Size выставить значение параметра Image Aspect равным 2.</p>
                              </div>
                              <img src="images/tutor-main_3dmax-corona2.png" alt="screen" />
                              <div class="clear"></div><br><br>
						  </div>
						  
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_short">
                                  <p><span class="indent_paragraph"></span>Для просмотра в виде виртуального тура, воспользуйтесь кнопкой "загрузить панораму". Разрешение присылаемых jpg-файлов, не должно быть более 8000х4000px и не более 20мб
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Если использовали для обработки фотошоп, сохраняйте картинк у progressive-jpg c качеством 6-8. Качество останется таким же, а скорость загрузки существенноо уменьшится
								  </p>
                                  <p><span class="indent_paragraph"></span>Для удобной постобработки визуализации, удобно отрендерить дополнительные маски, которые дадут возможность выделять предметы, материалы, корректировать освещение, создавая новые варианты для вашего заказчика без дополнительных перерасчетов
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Подробнее:
                                  </p>
								</div>
                              <img src="images/tutor-main_3dmax-corona3-1.png" alt="screen" />
                              <img src="images/tutor-main_3dmax-corona3-2.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div> 
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_long">
                                  <p><span class="indent_paragraph"></span>В 3DMax для этого предусмотрены рендер-элементы, которые рендерятся одновременно с основным рендером. Нажмите кнопку F10 (рендер), выберете вкладку Render Elemеnts добавляйте элементы:
								  </p>
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMaskingWireColor - рендерит все без разбора в цветах, в которым вы видите модель в 3дмаксе без материалов
								  </p>								  
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMasking_ID - Дает возможность получить цветную маску случайным образом генерируемой по материалу, по обьектам и тд
								  </p>
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMasking_Mask -  стандартный максовский элемент. С его помощью можно получить трехцветную маску RGB. В том же меню, можно выделить любой предмет. Также с его помощью можно выделить BufferID
								  </p>
                                  <p><span class="indent_paragraph"></span>С BuferID можно выделить объект или группу объектов (для этого нажмите правой кнопкой мыши на обьект, нажмите Object Properties)
								  </p>
                                  <p><span class="indent_paragraph"></span>Или можно выделить любой материал. Для этого зайдите в MaterialEditor и в закладке options выберите Effect ID. Выделяет при этом, гораздо качественней чем иные способы! 
									</p>
									<br><br><br>
									<p><span class="indent_paragraph"></span>Про другие рендер элементы рекомендуем прочитать на официальном сайте Vray <a href="https://docs.chaosgroup.com/display/VRAY3MAX/Render+Elements" class="text_link_download">docs.chaosgroup.com</a></p>
								</div>
								<img src="images/tutor-main_3dmax-corona4.png" alt="screen" />
                              <div class="clear"></div><br><br>
						  </div>					  
						  
						  
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                      </div>				  

					  
                      <div class="manual_content_item" id="manual_3">
                          <div style="text-align: center;" class="manual_item_first">
                              <span class="text_number_manual">1</span>
                              <div style="text-align: left;" class="text_manual_item_first">
                                  <p><span class="indent_paragraph"></span>Создайте камеру и разместите ее так, что бы высота камеры и точка в которую вы смотрите, находились на одной высоте (на уровне человеческого глаза). В зависимости от рендера можно поэксперементировать с любой камерой я пробовал лишь с обычной. Далее заходим в:</p>
                              </div>
                              <img style="display: inline-block; margin: 30px auto;" src="tz3.png" alt="photo" />
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">2</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                      <span class="indent_paragraph"></span>Далее, перед Вами окажется вот такое окно рендера, с немного нестандартными настройками. Не забудьте выбрать нужную камеру, поставьте хорошее разрешение и нажмите “рендер”.
                                  </p>
                              </div>
                              <img src="tz4.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                      <span class="indent_paragraph"></span>В итоге перед вами предстанет готовый виртуальный тур, который можно крутить и вертеть наслаждаться им. Чтобы сохранить виртуальный тур в виде картинки для дальнейшей обработки, нужно сохранить его в виде картинки.
                                  </p>
                              </div>
                              <img src="tz5.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_short">
                                  <p>
                                     <span class="indent_paragraph"></span>В итоге у Вас получится вот такой рендер:
                                  </p>
                              </div>
                              <img src="tz_example1.jpg" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="alert">Внимание! у нас пока отсутствует примеры.. Если захотите поделиться Вашим примером,<br/> оставьте нам сообщение в ”мнениях”. С нас, указание прямой ссылки на автора.</div>                    
                      </div>
                  </div>
               </div>
			   
			   
			   
			   
               <div class="tabs_with_help" id="SketchUp">
                  <div class="manual_content">
                      <div class="manual_content_item" id="manual_4">
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
						  
                          <div class="manual_item">
                              <span class="text_number_manual">1</span>
                             <div class="manual_text_position_left_long">
                                  <p><span class="indent_paragraph"></span>После завершения работы с моделью, отладкой всех материалов и света, зайдите в V-ray Asset Editor. Открываем вкладку Settings (Настройки) и находим настройки камеры. Изменяем тип со стандартного (который идет по умолчанию) на VR Spherical Panorama и проверяем размеры кадра - оптимальными значениями будут ширина 4096 и высота 2048 пикселей на дюйм
								  </p>
                              </div>
                              <img src="images/tutor-main_sketchup-vray1.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
						  
						  
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_short">
                                  <p><span class="indent_paragraph"></span>Для просмотра в виде виртуального тура, воспользуйтесь кнопкой "загрузить панораму". Разрешение присылаемых jpg-файлов, не должно быть более 8000х4000px и не более 20мб
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Если использовали для обработки фотошоп, сохраняйте картинк у progressive-jpg c качеством 6-8. Качество останется таким же, а скорость загрузки существенноо уменьшится
								  </p>
                                  <p><span class="indent_paragraph"></span>Для удобной постобработки визуализации, удобно отрендерить дополнительные маски, которые дадут возможность выделять предметы, материалы, корректировать освещение, создавая новые варианты для вашего заказчика без дополнительных перерасчетов
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Подробнее:
                                  </p>
								</div>
                              <img src="images/tutor-main_sketchup-vray2-1.jpg" alt="screen" />
                              <img src="images/tutor-main_sketchup-vray2-2.jpg" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div> 
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_long">
                                  <p><span class="indent_paragraph"></span>В 3DMax для этого предусмотрены рендер-элементы, которые рендерятся одновременно с основным рендером. Нажмите кнопку F10 (рендер), выберете вкладку Render Elemеnts добавляйте элементы:
								  </p>
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMaskingWireColor - рендерит все без разбора в цветах, в которым вы видите модель в 3дмаксе без материалов
								  </p>								  
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMasking_ID - Дает возможность получить цветную маску случайным образом генерируемой по материалу, по обьектам и тд
								  </p>
								  <br><br>
                                  <p><span class="indent_paragraph"></span>CMasking_Mask -  стандартный максовский элемент. С его помощью можно получить трехцветную маску RGB. В том же меню, можно выделить любой предмет. Также с его помощью можно выделить BufferID
								  </p>
                                  <p><span class="indent_paragraph"></span>С BuferID можно выделить объект или группу объектов (для этого нажмите правой кнопкой мыши на обьект, нажмите Object Properties)
								  </p>
                                  <p><span class="indent_paragraph"></span>Или можно выделить любой материал. Для этого зайдите в MaterialEditor и в закладке options выберите Effect ID. Выделяет при этом, гораздо качественней чем иные способы! 
									</p>
									<br><br><br>
									<p><span class="indent_paragraph"></span>Про другие рендер элементы рекомендуем прочитать на официальном сайте Vray <a href="https://docs.chaosgroup.com/display/VRAY3MAX/Render+Elements" class="text_link_download">docs.chaosgroup.com</a></p>
								</div>
								<img src="images/tutor-main_sketchup-vray3.png" alt="screen" />
                              <div class="clear"></div><br><br>
						  </div>
						  
						  
						  
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                    </div>
                </div>
                          <div class="alert">Внимание! у нас пока отсутствует примеры.. Если захотите поделиться Вашим примером,<br/> оставьте нам сообщение в ”мнениях”. С нас, указание прямой ссылки на автора.</div>                    
                      </div>
                  </div>
               </div>
			   
			   
			   
			   
			   
			   
			   
			   
			   
			  
               <div class="tabs_with_help" id="WHY">
                   <ul class="tabs_with_help_buttons clearfix">
                       <li><a href="#manual_5"><h3>С помощью Vray:</h3></a></li>
                       <li><a href="#manual_6"><h3>С помощью <span>Iray, MentalRay, Corona и др:</span></h3></a></li>
                   </ul>
                  <div class="manual_content">
                      <div class="manual_content_item" id="manual_5">
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                          <div class="manual_item_first">
                              <span class="text_number_manual">1</span>
                              <div class="text_manual_item_first">
                                  <p><span class="indent_paragraph"></span>Создайте камеру и разместите ее так чтобы высота камеры и точка в которую вы смотрите находились на одной высоте (на уровне человеческого глаза). Настройки камеры не важны. </p>
                                  <p><span class="indent_paragraph"></span>Для создания виртуального тура вы можете использовать любую камеру, 
                                  но если вы работаете с VrayPhysicalCamera, то в закладке vigneting уберите галочку.</p>
                              </div>
                              <div class="manual_item_first_photo">
                                  <img src="tz_camera-hight.gif" alt="photo" />
                                  <div class="text_italic">
                                      <p><span class="indent_paragraph"></span>Камера имеет встроенную регулировку угла обзора, но она не является сферической и макс- имальный угол обзора, который возможно там установить, не превышает 175 градусов. Для обхода этого ограничения V-Ray имеет специальный инструмент, расширяющий возможности стандартной камеры. Все изменения, сделанные с помощью этого инструмента не отображаются во вьюпорте 3ds Max и будут видны непосредственно на визуализации.</p>
                                  </div>
                              </div>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">2</span>
                             <div class="manual_text_position_left_long">
                                  <p>
                                     <span class="indent_paragraph"></span>Переходим в окно Render Scene: (F10). Здесь следует найти закладку V-Rray: Camera. В разделе Camera type в выпадающем списке Type выбрать тип камеры Spherical. Таким образом, камера станет сферической. После, необходимо активировать функцию Override FOV, установив напротив нее галочку для подмены угла обзора и установить в поле FOV необходимое значение подмены угла обзора в 360 градусов. 
                                 </p>
                             </div>
                              <img src="tz1.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                     <span class="indent_paragraph"></span>Чтобы получить корректное изображение проекции следует установить соотношение сторон 2:1 для финальной визуализации. Для этого необходимо перейти к закладке Common диалогового окна Render Scene: (F10) и в разделе Output Size выставить значение параметра Image Aspect равным 2.
                                  </p>
                              </div>
                              <img src="tz2.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_short">
                                  <p>
                                      <span class="indent_paragraph"></span>Для просмотра в виде виртуального тура, воспользуйтесь кнопкой "загрузить панораму". Разрешение присылаемых jpg-файлов, не должно быть более 8000х4000px и не более 20мб.
                                  </p>
                                  <br><br>
                                  <p><span class="indent_paragraph"></span>Если использовали для обработки фотошоп, сохраняйте картинк у progressive-jpg c качеством 6-8. Качество останется таким же, а скорость загрузки существенноо уменьшится.</p>
                              </div>
                              <img src="tz_example1.jpg" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <a href="/archholder_3dsmax-vray.rar" class="text_link_download">Скачать пример  виртуального 3D тура</a>
                      </div>
                      <div class="manual_content_item" id="manual_6">
                          <div style="text-align: center;" class="manual_item_first">
                              <span class="text_number_manual">1</span>
                              <div style="text-align: left;" class="text_manual_item_first">
                                  <p><span class="indent_paragraph"></span>Создайте камеру и разместите ее так, что бы высота камеры и точка в которую вы смотрите, находились на одной высоте (на уровне человеческого глаза). В зависимости от рендера можно поэксперементировать с любой камерой я пробовал лишь с обычной. Далее заходим в:</p>
                              </div>
                              <img style="display: inline-block; margin: 30px auto;" src="tz3.png" alt="photo" />
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">2</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                      <span class="indent_paragraph"></span>Далее, перед Вами окажется вот такое окно рендера, с немного нестандартными настройками. Не забудьте выбрать нужную камеру, поставьте хорошее разрешение и нажмите “рендер”.
                                  </p>
                              </div>
                              <img src="tz4.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">3</span>
                              <div class="manual_text_position_left_long">
                                  <p>
                                      <span class="indent_paragraph"></span>В итоге перед вами предстанет готовый виртуальный тур, который можно крутить и вертеть наслаждаться им. Чтобы сохранить виртуальный тур в виде картинки для дальнейшей обработки, нужно сохранить его в виде картинки.
                                  </p>
                              </div>
                              <img src="tz5.png" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="manual_item">
                              <span class="text_number_manual">4</span>
                              <div class="manual_text_position_left_short">
                                  <p>
                                     <span class="indent_paragraph"></span>В итоге у Вас получится вот такой рендер:
                                  </p>
                              </div>
                              <img src="tz_example1.jpg" alt="screen" />
                              <div class="clear"></div><br><br>
                          </div>
                          <div class="alert">Внимание! у нас пока отсутствует примеры.. Если захотите поделиться Вашим примером,<br/> оставьте нам сообщение в ”мнениях”. С нас, указание прямой ссылки на автора.</div>                    
                      </div>
                  </div>
				  
				  
				  
				  
				  
				  
	
               </div>
   
   

            </div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53a9f4976c05a2eb"></script>
            <script type="text/javascript">(function () {
                    if (window.pluso)
                        if (typeof window.pluso.start == "function")
                            return;
                    if (window.ifpluso == undefined) {
                        window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript';
                        s.charset = 'UTF-8';
                        s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
                        var h = d[g]('body')[0];
                        h.appendChild(s);
                    }
                })();</script>

            <div class="yandex">
                <img src="yandex.jpg" alt="metrika" />
            </div>
            <div class="pluso" data-background="none;" data-options="big,square,line,horizontal,counter,sepcounter=1,theme=14" data-services="vkontakte,odnoklassniki,facebook"></div>
            
			
			<!--    
            <a class="using" href="#">условия использования</a>
            -->
			
			
            <a href="#top" title="" class="button_up"></a>
        </main>
        <script>

            
            function load_pano(id)
            {
                document.getElementById('pano').src = '/' + id + '/';
                $.scrollTo('#logo', 800, {offset: {top: 0, left: 0}});
            }
            Cufon.replace(".cufon");

            //----------Якорь
            $(function () {
                $('.button_up').click(function () {
                    var target = $(this).attr('href');
                    $('html, body').animate({scrollTop: $(target).offset().top}, 500);
                    return false;
                });

                $("#dialog").dialog({
                    autoOpen: false,
                    width: 400,
                    title: "Ошибка",
                    buttons: [
                        {
                            text: "Ok",
                            click: function () {
                                $(this).dialog("close");
                            }
                        }
                    ]
                });
            });
        </script>

        <!-- Yandex.Metrika informer --><!--<a href="https://metrika.yandex.ru/stat/?id=27844434&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/27844434/3_0_E9E9E9FF_C9C9C9FF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try {
                    Ya.Metrika.informer({i: this, id: 27844434, lang: 'ru'});
                    return false
                } catch (e) {
                }"/></a>--><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><!--<script type="text/javascript">(function (d, w, c) {
                        (w[c] = w[c] || []).push(function () {
                            try {
                                w.yaCounter27844434 = new Ya.Metrika({id: 27844434, webvisor: true, clickmap: true, trackLinks: true, accurateTrackBounce: true});
                            } catch (e) {
                            }
                        });
                        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
                        if (w.opera == "[object Opera]") {
                            d.addEventListener("DOMContentLoaded", f, false);
                        } else {
                            f();
                        }
                    })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/27844434" style="position:absolute; left:-9999px;" alt="" /></div></noscript>--><!-- /Yandex.Metrika counter -->


        <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
    <!-- VK Widget -->
    <div class="clear" style="margin: 100px auto 0;" id="vk_groups"></div>
    <script type="text/javascript">
    VK.Widgets.Group("vk_groups", {mode: 0, width: "1194", height: "100", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 89677869);
    </script>

    </body>
</html>