function romanize (num) {
    if (!+num)
        return false;
    var digits = String(+num).split(""),
        key    = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
                  "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
                  "","I","II","III","IV","V","VI","VII","VIII","IX"],
        roman  = "",
        i      = 3;
    while (i--)
        roman = (key[+digits.pop() + (i * 10)] || "") + roman;
    return Array(+digits.join("") + 1).join("M") + roman;
}

$('#suratkeluar-id_jenis_surat').change(function(){
    var kode = $(this).find(':selected').data('kode');
    var count = $(this).find(':selected').data('count');
    var date  = new Date();
	var strRomanMonth = romanize(date.getMonth() + 1);
	var strRomanYear  = date.getFullYear(); 
    var content = $(this).find(':selected').data('content');
    $('#suratkeluar-no_suratkeluar').val(count + kode + "/" + strRomanMonth +"/" + strRomanYear);
    tinyMCE.activeEditor.setContent(content);
});
