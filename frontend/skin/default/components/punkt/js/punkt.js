
(function($) {
    "use strict";

    $.widget( "livestreet.wikiPunkt", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Селекторы
            selectors: {
                modal:"#punktModal"
            },
            i18n: {
                
            },
            urls:{
                load: aRouter.wiki + 'ajax-punkt'
            }
        },

        /**
         * Конструктор
         *
         * @constructor
         * @private
         */
        _create: function () {
            var _this = this;

            this._super();

            this.element.on('click', function(event){
                let modal = $(this.option('selectors.modal'));
                
                
                this._load( 'load', {punkt:this.element.text()}, function(result){
                    modal.find('.modal-body').html(result.html);
                    modal.modal('show');
                });
                event.preventDefault();
            }.bind(this))
            
            
            
        }
        
    });
})(jQuery);