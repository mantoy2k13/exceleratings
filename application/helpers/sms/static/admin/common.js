
/**
 * Created by BOSS on 7/12/2016.
 */

jQuery.fn.toggleAttr = function(attr) {
    return this.each(function() {
        var $this = $(this);
        $this.attr(attr) ? $this.removeAttr(attr) : $this.attr(attr, attr);
    });
};