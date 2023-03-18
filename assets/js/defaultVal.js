(function($){$.fn.extend({defaultVal:function(){return this.each(function(){var title;var $this=$(this);title=$this.attr('title');if($this.val()=="")$this.val(title);$this.attr('title','');$this.focus(function(){var $this=$(this);if($this.val()==title)
$this.val('');}).blur(function(){var $this=$(this);if($this.val()=='')
$this.val(title);});});}});})(jQuery);