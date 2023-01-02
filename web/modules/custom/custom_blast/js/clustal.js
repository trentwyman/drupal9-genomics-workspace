(function() {
   
    
    jQuery(function() { // document ready
    
        // load file into textarea
        jQuery('.query-file').change(function (evt) {
            if (window.File && window.FileReader) {
                var f = evt.target.files[0];
                console.log(f.type);
                if (f && (f.type.match('text.*') || f.type == '')) {
                    var r = new FileReader();
                    r.onload = function (e) {
                        var contents = e.target.result;
                        jQuery('#query-textarea').val(contents);
                        jQuery('#query-textarea').keyup();
                    }
                    r.readAsText(f);
                }
            }
        });
    
        function sum(obj) {
            var sum = 0;
            for(var el in obj) {
                if(obj.hasOwnProperty(el)) {
                    sum += parseFloat(obj[el]);
                }
            }
            return sum;
        }
    
        function filter_key(obj, test) {
            var result = {}, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key) && test(key)) {
                    result[key] = obj[key];
                }
            }
            return result;
        }
    
        function validateFasta(fasta) {
    
            if (!fasta) { // check there is something first of all
                return false;
            }
    
            // immediately remove trailing spaces
            fasta = fasta.trim();
    
            // split on newlines...
            var lines = fasta.split('\n');
    
            // check for header
            var fasta_count = 0;
            for (i = 0; i < lines.length; i++){
                if(i + 1 == lines.length){
                    //only one fasta
                    if(fasta_count == 1){return 4;}
                }else if(lines[i][0] == '>'){
                    lines[i] = '';
                    //no content
                    if(lines[i+1][0] == '>'){return 4;}
                    fasta_count = fasta_count + 1;
                }
            }
    
            // join the array back into a single string without newlines and
            // trailing or leading spaces
            fasta = lines.join('').trim();
    
            if (!fasta) { // is it empty whatever we collected ? re-check not efficient
                return false;
            }
    
            // note that the empty string is caught above
            // allow for Selenocysteine (U)
            if(/^[ATCGUN*\s]+jQuery/i.test(fasta)){return 1;}
            if(/^[ABCDEFGHIKLMNPQRSTVWXYZN*\s]+jQuery/i.test(fasta)){return 2;}
            return 3;
        }
    
        function setQueryType(qtype) {
            query_type = qtype;
            if(jQuery('#texterror').length){
                jQuery('#texterror').remove();
            }
            jQuery('.sequenceType').attr('disabled', false).removeClass('disabled-radio');
            if (qtype == '') {
                jQuery('.enter-query-text').before("<label id='texterror' class=\"error\">No sequence found!</label>");
                jQuery('.enter-query-text').html('Enter sequence below in <a href="http://en.wikipedia.org/wiki/FASTA_format">FASTA</a> format:');
            } else if (qtype == 'invalid') {
                jQuery('.enter-query-text').before("<label id='texterror' class=\"error\">Your sequence is invalid:</label>");
                jQuery('.enter-query-text').html('Enter sequence below in <a href="http://en.wikipedia.org/wiki/FASTA_format">FASTA</a> format:');
            } else if (qtype == 'not_multiple') {
                jQuery('.enter-query-text').before("<label id='texterror' class=\"error\">You must provide 2+ sequence</label>");
                jQuery('.enter-query-text').html('Enter sequence below in <a href="http://en.wikipedia.org/wiki/FASTA_format">FASTA</a> format:');
            } else if (qtype == 'nucleotide') {
                jQuery('.enter-query-text').html('Your sequence is detected as nucleotide:');
                jQuery('.sequenceType.dna').prop('checked', true);
                jQuery('.sequenceType').change();
            } else if (qtype == 'peptide') {
                jQuery('.enter-query-text').html('Your sequence is detected as peptide:');
                jQuery('.sequenceType.protein').prop('checked', true);
                jQuery('.sequenceType').change();
            }
        }
    
        function checktxt() {
            if (jQuery('#query-textarea').val() == '') {
                setQueryType('');
                return false;
            }else if(validateFasta(jQuery('#query-textarea').val()) == 1) {
                setQueryType('nucleotide');
                return true;
            }else if(validateFasta(jQuery('#query-textarea').val()) == 2) {
                setQueryType('peptide');
                return true;
            }else if(validateFasta(jQuery('#query-textarea').val()) == 4) {
                setQueryType('not_multiple');
                return true;
            }else{
                setQueryType('invalid');
                return false;
            }
        }
    
        var parseTextarea = _.debounce(checktxt, 30);
        jQuery('#query-textarea').keyup(parseTextarea);
    
        jQuery('.sequenceType').change(function (){
            if(jQuery('.sequenceType:checked').val() == 'dna'){
                jQuery('#fieldset-protein-multi').css('display','none');
                jQuery('#fieldset-dna-multi').css('display','inline');
                if(jQuery('.pairwise:checked').val() == 'full'){
                    jQuery('#fieldset-protein-full').css('display','none');
                    jQuery('#fieldset-dna-full').css('display','inline');
                }
            }else if(jQuery('.sequenceType:checked').val() == 'protein'){
                jQuery('#fieldset-dna-multi').css('display','none');
                jQuery('#fieldset-protein-multi').css('display','inline');
                if(jQuery('.pairwise:checked').val() == 'full') {
                    jQuery('#fieldset-dna-full').css('display', 'none');
                    jQuery('#fieldset-protein-full').css('display', 'inline');
                }
            }
        });
    
            var ex_nucleotide = ">Test1\n\ATCGATGCTA\n\>Test2\n\ATCGATCGATCGA"
    
            jQuery('.load-example').click(function() {
                    jQuery('#query-textarea').val(ex_nucleotide);
                    jQuery('#query-textarea').keyup();
            });
    
            var ex_clustal = ">CLEC010822-PA:polypeptide, Heat shock protein 70-2\n\
    MILHFLVLLFASALAADEKNKDVGTVVGIDLGTTYSCVGVYKNGRVEIIANDQGNRITPSYVAFTSEGERLIGDAAKNQLTTNPENTVFDAKRLIGREWTDSTVQDDIKFFPFKVLEKNSKPHIQVSTSQGNKMFAPEEISAMVLGKMKETAEAYLGKKVTHAVVTVPAYFNDAQRQATKDAGTISGLNVMRIINEPTAAAIAYGLDKKEGEKNVLVFDLGGGTFDVSLLTIDNGVFEVVSTNGDTHLGGEDFDQRVMDHFIKLYKKKKGKDIRKDNRAVQKLRREVEKAKRALSSSHQVRIEIESFYDGEDFSETLTRAKFEELNMDLFRSTMKPVQKVLEDADMNKKDVDEIVLVGGSTRIPKVQALVKEFFNGKEPSRGINPDEAVAYGAAVQAGVLSGEQDTDSIVLLDVNPLTLGIETVGGVMTKLIPRNTVIPTKKSQIFSTASDNQHTVTIQVYEGERPMTKDNHLLGKFDLTGIPPAPRGVPQIEVTFEIDANGILQVSAEDKGTGNREKIVITNDQNRLTPDDIDRMIKDAEKFADDDKKLKERVEARNELESYAYSLKNQLADKDKFGSKVTDSDKAKMEKAIEEKIKWLDENQDADSEAFKKQKKELEDVVQPIISKLYQGGAPPPPGAGPQSEDDLKDEL*\n\
    >OFAS004830-PA:polypeptide, Heat shock protein 70-2\n\
    MAAGGSRPTRPAVGIDLGTTYSCVGYFDKGRVEIIANDQGNRVTPSYVAFTETDRIVGDAARGQAIMNPSNTVYDAKRLIGRKFDDPSVQADRKMWPFKVASKEGKPMIEVTYKGETRQFFPEEISSMVLSKMRETAESYIGKKVSNAVVTVPAYFNDSQRQATKDSGTIAGLNVLRIINEPTAAAVAYGLDKKGSGEINVLIFDLGGGTFDVSVLTIADGLFEVKATAGDTHLGGADFDNRMVQYFLEEFKRKTKKEVNDNKRALRRLQAACERAKRVLSTATQATVEIDSFVDGIDLYSAVSRAKFEEINSDLFRGTLGPVEKAIRDSKIPKNRIDEIVLVGGSTRIPKIQSLLVEYFNGKELNKTINPDEAVAYGAAVQAAIIVGDTSDEVKDVLLLDVTPLSLGIETAGGIMTNLIPRNTTIPVKHSQIFSTYSDNQPGVLIQVYEGERAMTKDNNLLGTFELRGFPPAPRGVPQIEVAFDVDANGILNVTAQEMSTKKTSKITITNDKGRLTKAQIEKMVKEAERYKSEDTAARETAEAKNGLESYCYAMKNSVEEAANLGRVTEDEMKSVVRKCNETIMWIEANRSATKMEFEKKMRETESVCKPIATKILSRGTQQNNAGGGTPTNERGPVIEEAD\n\
    >OFAS004738-PA:polypeptide, Heat shock protein 70-1\n\
    MPAIGIDLGTTYSCVGVWQHGKVEIIANDQGNRTTPSYVAFSDTERLIGDAAKNQVAMNPQNTVFDAKRLIGRKYDDPKIQDDLKHWPFRVVDCSSKPKIQVEYKGETKTFAPEEISSMVLVKMKETAEAYLGGTVRDAVITVPAYFNDSQRQATKDAGAIAGLNVLRIINEPTAAALAYGLDKNLKGERNVLIFDLGGGTFDGPREQDHSLKGERNVLIFDLGGGTFDVSILTIDEGSLFEVKSTAGDTHLGGEDFDNRLVNHLAEEFKRKYRKDLKTNPRALRRLRTAAERAKRTLSSSTEASIEIDALFEGVDFYTKITRARFEELCSDLFRSTLQPVEKALQDAKLDKGLIHDVVLVGGSTRIPKIQNLLQNFFNGKSLNMSINPDEAVAYGAAVQAAILSGDQSSKIQDVLLVDVAPLSLGIETAGGVMTKIIERNTRI";
    
            jQuery('.load-nucleotide').click(function() {
                jQuery('#query-textarea').val(ex_clustal);
                jQuery('#query-textarea').keyup();
            });
    
    
    
        jQuery('.pairwise').change(function (){
            if(jQuery('.pairwise:checked').val() == 'fast'){
                jQuery('#fieldset-protein-full').css('display','none');
                jQuery('#fieldset-dna-full').css('display','none');
                jQuery('#fieldset-fast').css('display','inline');
            }else if(jQuery('.pairwise:checked').val() == 'full'){
                jQuery('#fieldset-fast').css('display','none');
                if(jQuery('.sequenceType:checked').val() == 'protein'){
                    jQuery('#fieldset-protein-full').css('display','inline');
                }else if(jQuery('.sequenceType:checked').val() == 'dna'){
                    jQuery('#fieldset-dna-full').css('display','inline');
                }
            }
        });
    
    
    
        // Validate MainClustalForm form on keyup and submit
        jQuery("#MainClustalForm").validate({
            rules: {
                'query-sequence': {
                    //'textarea_valid':'',
                    required: true
                },
                'dna-PWGAPOPEN': {
                    number: true
                },
                'dna-PWGAPEXT': {
                    number: true
                },
                'protein-PWGAPOPEN': {
                    number: true
                },
                'protein-PWGAPEXT': {
                    number: true
                },
                'KTUPLE': {
                    number: true
                },
                'WINDOW': {
                    number: true
                },
                'PAIRGAP': {
                    number: true
                },
                'TOPDIAGS': {
                    number: true
                },
                'dna-GAPOPEN': {
                    number: true
                },
                'dna-GAPEXT': {
                    number: true
                },
                'dna-GAPDIST': {
                    number: true
                },
                'dna-NUMITER': {
                    number: true
                },
                'protein-GAPOPEN': {
                    number: true
                },
                'protein-GAPEXT': {
                    number: true
                },
                'protein-GAPDIST': {
                    number: true
                },
                'protein-NUMITER': {
                    number: true
                },
            },
            messages: {
                'query-sequence': {
                    required: "No sequence found!"
                },
                'dna-PWGAPOPEN': {
                    number: "<br>Please enter a valid number"
                },
                'dna-PWGAPEXT': {
                    number: "<br>Please enter a valid number"
                },
                'protein-PWGAPOPEN': {
                    number: "<br>Please enter a valid number"
                },
                'protein-PWGAPEXT': {
                    number: "<br>Please enter a valid number"
                },
                'KTUPLE': {
                    number: "<br>Please enter a valid number"
                },
                'WINDOW': {
                    number: "<br>Please enter a valid number"
                },
                'PAIRGAP': {
                    number: "<br>Please enter a valid number"
                },
                'TOPDIAGS': {
                    number: "<br>Please enter a valid number"
                },
                'dna-GAPOPEN': {
                    number: "<br>Please enter a valid number"
                },
                'dna-GAPEXT': {
                    number: "<br>Please enter a valid number"
                },
                'dna-GAPDIST': {
                    number: "<br>Please enter a valid number"
                },
                'dna-NUMITER': {
                    number: "<br>Please enter a valid number"
                },
                'protein-GAPOPEN': {
                    number: "<br>Please enter a valid number"
                },
                'protein-GAPEXT': {
                    number: "<br>Please enter a valid number"
                },
                'protein-GAPDIST': {
                    number: "<br>Please enter a valid number"
                },
                'protein-NUMITER': {
                    number: "<br>Please enter a valid number"
                },
            },
            errorPlacement: function (error, element) {
                switch (element.attr('name').toString()) {
                    case 'query-sequence':
                        error.insertAfter('#legend-sequence');
                        break;
                    default:
                        error.insertAfter(element);
                }
            }
        });
    
        jQuery('#queries-tab').click(function() {
            user_id = jQuery('table[id^="queries-"]')[0].id.split('-')[1];
            if ( jQuery.fn.dataTable.isDataTable('#queries-' + user_id) ) {
                var table = jQuery('#queries-' + user_id).DataTable();
                table.ajax.reload();
            }
            else {
                jQuery('#queries-' + user_id).dataTable( {
                    "ajax": {
                        "url": window.location.pathname + "user-tasks/" + user_id,
                        "dataSrc": ""
                    },
                    "columns": [
                        { "data": "enqueue_date" },
                        { "data": "result_status" },
                        { "data": "task_id" },
    
                    ],
                    "aoColumnDefs": [{
                        "aTargets": [2], // Column to target
                        "mRender": function ( data, type, full ) {
                            // 'full' is the row's data object, and 'data' is this column's data
                            // e.g. 'full[0]' is the comic id, and 'data' is the comic title
                            return '<a href="' + data  + '" target="_blank">' + data + '</a>';
                        }},
                        {
                        "aTargets": [0], // Column to target
                        "mRender": function ( data, type, full ) {
                            return new Date(data).toUTCString();
                        }}
                    ],
                    "order": [[ 0, "desc" ]],
                });
            }
        });
    
        jQuery('#clustalw_submit').click(function() {
            {
                if (checktxt() && jQuery("#MainClustalForm").valid()) {
                    jQuery('#program').val('clustalw');
                    alert("form data would be submitted.");

                    // jQuery('#MainClustalForm').submit();
                }
            }
        });
    
        jQuery('#clustalo_submit').click(function() {
            {
                if (checktxt() && jQuery("#MainClustalForm").valid()) {
                    jQuery('#program').val('clustalo');
                    alert("form data would be submitted.");

                    // jQuery('#MainClustalForm').submit();
                }
            }
        });
    
        jQuery('.btn_reset').click(function() {
            {
                jQuery('.sequenceType').attr('disabled', false).removeClass('disabled-radio');
                jQuery('.enter-query-text').html('Enter sequence below in <a href="http://en.wikipedia.org/wiki/FASTA_format">FASTA</a> format:');
                var validator = jQuery( "#MainClustalForm" ).validate();
                validator.resetForm();
                jQuery('.sequenceType.protein').prop('checked', true);
                jQuery('.sequenceType.protein').change();
                jQuery('.pairwise.full').prop('checked', true);
                jQuery('.pairwise.full').change();
            }
        });
    
    });
    
    
    }).call(this);