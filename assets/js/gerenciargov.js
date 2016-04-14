$(document).ready(function() {
        $('.popup-with-form').magnificPopup({
          type: 'inline',
          preloader: false,
          focus: '#name',

          // When elemened is focused, some mobile browsers in some cases zoom in
          // It looks not nice, so we disable it:
          callbacks: {
            beforeOpen: function() {
              if($(window).width() < 700) {
                this.st.focus = false;
              } else {
                this.st.focus = '#name';
              }
            }
          }
        });
      });
 

$('#cpf_cnpj_1').click(function() {
    $("#cpf-cnpj").removeClass("form-control cpf");
    $("#cpf-cnpj").addClass("form-control cnpj");
});

$('#cpf_cnpj_0').click(function() {
    $("#cpf-cnpj").removeClass("form-control cnpj");
    $("#cpf-cnpj").addClass("form-control cpf");
});

jQuery( function($){

    $(".data").mask("99/99/9999");
    $(".tel").mask("(99) 9999-9999");
    $(".cel").mask("(99) 99999-9999");
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $(".cep").mask("99999-999");
    $(".placa").mask("aaa-9999");
	
	//Inicio Mascara Telefone para aceitar telefones fixos e celulares com 8 e 9 digitos
	$('.fixo_cel')  
        .mask("(99) 9999-9999?9")  
        .keydown(function() {
            var $elem = $(this);
            var tamanhoAnterior = this.value.replace(/\D/g, '').length;
            setTimeout(function() { 
                var novoTamanho = $elem.val().replace(/\D/g, '').length;
                if (novoTamanho !== tamanhoAnterior) {
                    if (novoTamanho === 11) {  
                        $elem.unmask();  
                        $elem.mask("(99) 99999-9999");  
                    } else if (novoTamanho === 10) {  
                        $elem.unmask();  
                        $elem.mask("(99) 9999-9999?9");  
                    }
                }
            }, 1);
        });
	//Fim Mascara Telefone

});
	  
$(document).ready(function($) {
		
		$('.mfp-build-tool-link').magnificPopup({closeBtnInside:true, type:'inline', midClick: true});

		var h = window.location.hash;
		if(h.indexOf('build=') > -1) {
			var formInputs = $('#mfp-build-form input');
			
		    if(h.indexOf('&') > 0) {
		       h = h.substr(0, h.indexOf('&'));
		    }
		    var items = h.substr(h.indexOf('build=') + 6, h.length).split('+');
		    for(var i = 0; i < items.length; i++) {
		      var name = items[i];
		      if(name) {
		        formInputs.filter('[name="' +name+ '"]').addClass('present');
		      }
		    }
	    	formInputs.not('.present').prop('checked', false);
    	}


	    var button = $('#mfp-build-button').click(function(e) {
	    	e.preventDefault();

	    	button.attr('disabled', 'disabled');

	    	var statusTimeout;
	    	var setStatus = function(msg, type) {
	    		clearTimeout(statusTimeout);
	    		$('#mfp-build-status').html('<span class="'+type+'">'+msg+'</span>').show();
	    	};
	    	setStatus('Wait a moment please...', 'progress');
	    	$('#mfp-build-tool-out').val( '' );

	    	

	    	var minify = $('#mfp-minify')[0].checked;
	    	var removeModule = function(source, key) {
			        source = source.replace(new RegExp("\\/\\*>>"+key+"\\*\\/[\\s|\\S]*?\\/\\*>>"+key+"\\*\\/", "ig"), "");
			        return source;
			    };





			var onError = function() {
				setStatus("Error: Build tool wasn't able to GET the js file. Please try again or make file by yourself using Grunt.", 'error');
			};

			var version = '1.1.0';
			var loadedScripts = [];
		    var onScriptsLoaded = function() {

		    	
			    var src = loadedScripts[0];

			    var hash = '',
		            name;

		        $('#mfp-build-form input').each(function() {
		          name = $(this).attr('name');

		          if( this.checked ) {
		            hash += name + '+';
		          } else {
		            src = removeModule(src, name);
		          }

		        });

		        var output = '';

		        if(hash) {
		        	hash = hash.substr(0, hash.length-1);
		        }
		        
		        if(minify) {
					src = uglify(src, ["--extra","--unsafe"]);
					output = '// Magnific Popup v'+version+' by Dmitry Semenov' + "\n";
		        	output += '// http://bit.ly/magnific-popup' + (hash ? '#build=' + hash : '') + "\n" + src;
		        } else {
		        	output = src;
		        }
		        
		        if(!hash) {
		        	hash = 'core';
		        } else {
		       		hash = 'core+' + hash;
		        }

		        $('#mfp-build-tool-out').val( output ).show();

		        button.removeAttr('disabled');

		        setStatus('Magnific Popup main js file successfully generated! You can copy generated code from textarea below.' + (hash ? (' Your build includes: <strong>' + hash.split('+').join(', ')) + '</strong>. ' : ''), 'success');
		    };


		    $.ajax({
			 	url:"dist/jquery.magnific-popup.js?v="+version, 
			 	dataType: 'text',
			 	success: function( data) {
			 		loadedScripts[0] = data;
			 		if(loadedScripts[1]) {
			 			onScriptsLoaded();
			 		}
			 	},
			 	error: onError
			});

			$.ajax({
			 	url:"third-party-libs/uglify.js", 
			 	dataType: 'script',
			 	cache: true,
			 	success: function(data) {
			 		loadedScripts[1] = data;
			 		if(loadedScripts[0]) {
			 			onScriptsLoaded();
			 		}
			 	},
			 	error: onError
			});

		});
		/* build tool END */






		/**
		 * Popup with source code for each example
		 */
		var example,
		      getCode,
		      CSS,
		      JS,
		      HTML,
		      highlighterLoaded;

		  var formatCode = function (str) {
		      if(str) {
		        // replace special chars
		        str = str.replace(/[&<>"']/g, function($0) {
		            return "&" + {"&":"amp", "<":"lt", ">":"gt", '"':"quot", "'":"#39"}[$0] + ";";
		        });
		        
		        // remove spaces from each line based on spaces on first line
		        var firstLineLength = str.match(/^(\s*)/)[1].length;
		        var regExp = new RegExp('^ {' + (firstLineLength-1) + '}', "gm");
		        str = str.replace(regExp, '');

		        // replace spaces with tabs
		        str = str.replace(/  /g,'\t');

		        str = $.trim(str);
		      }
		      return str;
		    };

		  var highlight = function() {
		    hljs.highlightBlock(JS.find('code')[0]);

		    if(CSS)
		      hljs.highlightBlock(CSS.find('code')[0]);

		    if(HTML)
		      hljs.highlightBlock(HTML.find('code')[0]);
		  };

		$('.example').each(function() {
		    $(this).find('h3').click(function() {
				var example = $(this).parent('.example');
				var getCodeWindow = $('<div class="get-code-window"><h1>'+example.find('h3').text()+'</h1></div>');
				JS = $('<div class="highlight"><pre><code class="javascript">'+formatCode(example.find('script').eq(0).html())+'</code></pre></div>');

				CSS = example.find('style');
				if(CSS.length) {
					CSS = $('<div class="highlight"><pre><code class="css">'+formatCode(CSS.html())+'</code></pre></div>');
				} else {
					CSS = '';
				}

				HTML = example.find('.html-code');
				if(HTML.length) {
					HTML = $('<div class="highlight"><pre><code class="xml html">'+formatCode(HTML.html())+'</code></pre></div>');
				} else {
					HTML = '';
				}

				if(!highlighterLoaded) {
					highlighterLoaded = true;
					var script = document.createElement("script"),
						$script = $(script);
						script.src = 'http://yandex.st/highlightjs/7.3/highlight.min.js';
					if(window.jQuery) {
						$.getScript(script.src , function() {
							highlight();
						});
					} else {
						$(script).appendTo("head").on("load", function() {
							highlight();
						});
					}
				} else {
					highlight();
				}

				getCodeWindow.append(JS);
				getCodeWindow.append(HTML);
				getCodeWindow.append(CSS);

				getCodeWindow.append('<p>Code above is dynamically generated directly from the source of this example.<br/>Please read <a href="documentation.html">the documentation</a> before using it.</p>');

				$.magnificPopup.open({
					items: {
						src: getCodeWindow,
						type: 'inline'
					}
				});

		});

	});
});