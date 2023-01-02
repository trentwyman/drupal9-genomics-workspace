(function() {
  function preprocess(dataset_list) {
    var dataset_dict = {};
    var organism_list = [];
    var alphabet_list = [];
    var dataset_list_count = dataset_list.length;
    for (var i = 0; i < dataset_list_count; i++) {
        var entry = dataset_list[i];
        var data_type = entry[0];
        var alphabet = entry[1];
        var file_name = entry[2];
        var organism_name = entry[3];
        var description = entry[4];
        if (!(organism_name in dataset_dict)) {
            dataset_dict[organism_name] = {};
            organism_list.push(organism_name);
            //console.log(organism_name);
        }
        if (!(alphabet in dataset_dict[organism_name])) {
            dataset_dict[organism_name][alphabet] = [];
        }
        if (jQuery.inArray(alphabet, alphabet_list) < 0) {
            alphabet_list.push(alphabet);
        }
        dataset_dict[organism_name][alphabet].push([file_name, data_type, description]); // add info
    }
    return [dataset_dict, organism_list, alphabet_list];
}

[dataset_dict, organism_list, alphabet_list] = preprocess(dataset_list);

// for IE6,7,8
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function (obj, fromIndex) {
    if (fromIndex == null) {
        fromIndex = 0;
    } else if (fromIndex < 0) {
        fromIndex = Math.max(0, this.length + fromIndex);
    }
    for (var i = fromIndex, j = this.length; i < j; i++) {
        if (this[i] === obj)
            return i;
    }
    return -1;
  };
}

jQuery(function() { // document ready
    ///////////////////////////////
    // HTML STRUCTURE GENERATION //
    ///////////////////////////////

    ////////////////////
    // EVENT HANDLING //
    ////////////////////

    var default_data_type = jQuery('.all-dataset-checkbox').attr('dataset-type') || 'genome-assembly';
    jQuery('.organism-div').hoverIntent(function() {
        // show and hide right panel
        jQuery('.datasets-div').hide();
        jQuery('.' + jQuery(this).attr('organism') + '.datasets-div').show();
        // background toggle
        jQuery('.organism-div').removeClass('organism-active-background');
        jQuery(this).addClass('organism-active-background');
        //console.log('.' + jQuery(this).attr('organism') + '.datasets-div');
    });
    jQuery('.organism-checkbox').change(function(e) {
        if (jQuery(this).is(':checked')) {
            jQuery('.dataset-checkbox.' + jQuery(this).attr('organism') + '.' + default_data_type).prop('checked', true).change();
            //console.log('.datasets-checkbox.' + jQuery(this).attr('organism') + '.' + default_data_type);
        } else {
            // uncheck all dataset checkboxes of the organism
            jQuery('.dataset-checkbox.' + jQuery(this).attr('organism')).prop('checked', false).change();
        }
    });
    jQuery('.dataset-checkbox').change(function() {
        if (jQuery(this).is(':checked')) {
            // check organism checkbox
            jQuery('.organism-checkbox.' + jQuery(this).attr('organism')).prop('checked', true);
            default_data_type = jQuery(this).attr('dataset-type');
        } else {
            //console.log(jQuery('.dataset-checkbox.' + jQuery(this).attr('organism')).is(':checked'));
            // if none of the dataset checkboxes are checked
            if (!jQuery('.dataset-checkbox.' + jQuery(this).attr('organism')).is(':checked')) {
                // uncheck the organism checkbox
                jQuery('.organism-checkbox.' + jQuery(this).attr('organism')).prop('checked', false);
            }
        }
        setDatabaseType();
    });
    jQuery('.all-organism-checkbox').change(function() {
        if (jQuery(this).is(':checked')) {
            jQuery('.all-dataset-checkbox.' + default_data_type).prop('checked', true);
            // check all dataset checkboxes with the dataset type
            jQuery('.dataset-checkbox.' + default_data_type).prop('checked', true).change();
        } else {
            // uncheck all dataset checkboxes of the organism
            jQuery('.all-dataset-checkbox').prop('checked', false).change();
        }
    });
    jQuery('.all-dataset-checkbox').change(function() {
        if (jQuery(this).is(':checked')) {
            // check organism checkbox
            jQuery('.all-organism-checkbox').prop('checked', true);
            // check all dataset checkboxes with the dataset type
            jQuery('.dataset-checkbox.' + jQuery(this).attr('dataset-type')).prop('checked', true).change();
        } else {
            // uncheck all dataset checkboxes with the dataset type
            jQuery('.dataset-checkbox.' + jQuery(this).attr('dataset-type')).prop('checked', false).change();
            // if none of the dataset checkboxes are checked
            if (!jQuery('.all-dataset-checkbox').is(':checked')) {
                // uncheck the organism checkbox
                jQuery('.all-organism-checkbox').prop('checked', false);
            }
        }
    });

    var db_type = '';
    function setDatabaseType() {
        if (db_type == '') {
            // check what has been checked
            if (jQuery('.nucleotide').is(':checked')) {
                db_type = 'nucleotide';
                jQuery('.peptide').prop('disabled', true).addClass('disabled-fieldset');
            } else if (jQuery('.peptide').is(':checked')) {
                db_type = 'peptide';
                jQuery('.nucleotide').prop('disabled', true).addClass('disabled-fieldset');
            }
        } else {
            if (!jQuery('.dataset-checkbox').is(':checked')) {
                db_type = '';
                jQuery('.peptide').prop('disabled', false).removeClass('disabled-fieldset');
                jQuery('.nucleotide').prop('disabled', false).removeClass('disabled-fieldset');
            }
        }
        chooseProgram();
    }

    var query_type = '';
    function setQueryType(qtype) {
        query_type = qtype;
        if (qtype == '') {
            jQuery('.enter-query-text').html('Enter sequence below in <a href="docs/fasta.html">FASTA</a> format:');
        } else if (qtype == 'invalid') {
            jQuery('.enter-query-text').html('Your sequence is invalid:');
        } else if (qtype == 'nucleotide') {
            jQuery('.enter-query-text').html('Your sequence is detected as nucleotide:');
        } else if (qtype == 'peptide') {
            jQuery('.enter-query-text').html('Your sequence is detected as peptide:');
        }
        chooseProgram();
    }

    var program_selected = 'blastn';
    var chooseProgram = _.debounce(function () {
        jQuery('.program').prop('disabled', false).removeClass('disabled-radio');
        if (db_type == 'nucleotide') {
            jQuery('.blastp').prop('disabled', true).addClass('disabled-radio');
            jQuery('.blastx').prop('disabled', true).addClass('disabled-radio');
        } else if (db_type == 'peptide') {
            jQuery('.blastn').prop('disabled', true).addClass('disabled-radio');
            jQuery('.tblastn').prop('disabled', true).addClass('disabled-radio');
            jQuery('.tblastx').prop('disabled', true).addClass('disabled-radio');
        }
        if (query_type == 'nucleotide') {
            jQuery('.blastp').prop('disabled', true).addClass('disabled-radio');
            jQuery('.tblastn').prop('disabled', true).addClass('disabled-radio');
        } else if (query_type == 'peptide') {
            jQuery('.blastn').prop('disabled', true).addClass('disabled-radio');
            jQuery('.blastx').prop('disabled', true).addClass('disabled-radio');
            jQuery('.tblastx').prop('disabled', true).addClass('disabled-radio');
        }
        // query_type = ''; //issue 403
        // select first non disabled option
        jQuery('input.program:not([disabled])').first().prop('checked', true);
        program_selected = jQuery('input.program:not([disabled])').first().val();
        if(program_selected != undefined){
          jQuery('.' + program_selected).mouseover();
          console.log(program_selected);
          add_blast_options(program_selected.toUpperCase());
        }
    }, 30);


    //Reset all element if reload of previous page when back button is pressed
    if (jQuery('#click_submit_hidden').val() == 'true') {
        jQuery('#click_submit_hidden').val('false');
        jQuery('#query-textarea').val('');
        jQuery(".query-file").replaceWith('<input type="file" name="query-file" class="query-file">');
        jQuery('.all-organism-checkbox').prop("checked", false);
        jQuery('.all-organism-checkbox').change();
        jQuery('.program').prop('disabled', false).removeClass('disabled-radio');
        console.log("hey");
        chooseProgram();

    }

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

    var parseTextarea = _.debounce(function () {
        // parse only the first 100 chars for speed
        //console.log(jQuery('#query-textarea').val());
        var lines = jQuery('#query-textarea').val().substring(0, 1000).match(/[^\r\n]+/g);
        if (lines == null) {
            setQueryType('');
            return;
        }
        var line_count = lines.length;
        var seq_count = 0;
        var alphabets = {};
        // http://www.ncbi.nlm.nih.gov/BLAST/blastcgihelp.shtml
        var normal_nucleic_codes = 'ATCGN';
        var valid_amino_codes = 'ABCDEFGHIKLMNPQRSTUVWXYZ*';
        var amino_only_codes = 'EFILPQZX*';
        for (var i = 0; i < line_count; i++) {
            //console.log(i + ' ' + lines[i]);
            var line = jQuery.trim(lines[i]).toUpperCase();
            if (line[0] == '>') {
                seq_count++;
            } else {
                // check_alphabet(line);
                for (var j = 0; j < line.length; j++) {
                    if (!(line[j] in alphabets)) {
                        alphabets[line[j]] = 1;
                    } else {
                        alphabets[line[j]]++;
                    }
                }
            }
        }
        //console.log(alphabets);
        var valid_amino_count = sum(filter_key(alphabets, function (key) {
            return valid_amino_codes.indexOf(key) != -1;
        }));
        var amino_only_count = sum(filter_key(alphabets, function (key) {
            return amino_only_codes.indexOf(key) != -1;
        }));
        var normal_nucleic_count = sum(filter_key(alphabets, function (key) {
            return normal_nucleic_codes.indexOf(key) != -1;
        }));
        var total_count = sum(alphabets);
        // Too many degenerate codes within an input nucleotide query will cause blast.cgi to
        // reject the input. For protein queries, too many nucleotide-like code (A,C,G,T,N) may also
        // cause similar rejection.
        if (total_count == 0) {
            setQueryType('');
        } else if ((normal_nucleic_count / total_count) > 0.6 && amino_only_count == 0) {
            setQueryType('nucleotide');
        } else if (valid_amino_count == total_count) {
            setQueryType('peptide');
        } else {
            setQueryType('invalid');
        }
        //console.log(query_type, normal_nucleic_count, total_count);
    }, 30);
    jQuery('#query-textarea').keyup(parseTextarea);

     // blast program descriptions for labels and their radio buttons
    jQuery('.blastn').mouseover(function() {
        jQuery('#blastProgramDescription').text('blastn - Nucleotide vs. Nucleotide');
    });
    jQuery('.tblastn').mouseover(function() {
        jQuery('#blastProgramDescription').text('tblastn - Peptide vs. Translated Nucleotide');
    });
    jQuery('.tblastx').mouseover(function() {
        jQuery('#blastProgramDescription').text('tblastx - Translated Nucleotide vs. Translated Nucleotide');
    });
    jQuery('.blastp').mouseover(function() {
        jQuery('#blastProgramDescription').text('blastp - Peptide vs. Peptide');
    });
    jQuery('.blastx').mouseover(function() {
        jQuery('#blastProgramDescription').text('blastx - Translated Nucleotide vs. Peptide');
    });
    jQuery('#fieldset-program').mouseleave(function() {
        jQuery('.' + jQuery('input.program:checked').val()).mouseover();
    });

    // example sequences for testing
    var ex_nucleotide = ">CLEC010822-RA:cDNA , Heat shock protein 70-2\n" +
                        "TGGAAATTTAAATATTTTCGATTTGGCGCGCCTTTAAGCCGGCGCCC" +
                        "AATCGCGTTTCGGAACGTATTGTCAGTCAGCCGGACCAATCAACGCC" +
                        "GTCCACGATTCCCGACTTCTCCCCGTCACCCAACCCCATTCTTATTC" +
                        "CACAGCCGCGGCCGTTCGTCCGTTCAGTCGAACCTAGGACTTGATTC" +
                        "GAGTACAAAGCGGACGAAAAAACGCGAATTAAACATAGTGTCTTATT" +
                        "CTTAATTTTGATCTAGTTGAAAACAAAAAAAGAGAGAAGGGTATATT" +
                        "TTTTTATATTTTCGAGTCAGTTGTATCAAAAATCAAACCGGAATAAT" +
                        "TCAGAGATTTTCACAATAATGATTTTACATTTTCTCGTTTTGCTTTT" +
                        "CGCTTCGGCCTTAGCAGCCGACGAGAAGAATAAGGACGTCGGAACCG" +
                        "TCGTGGGCATTGACCTCGGCACGACTTACTCTTGTGTGGGAGTGTAC" +
                        "AAGAATGGAAGAGTTGAAATCATCGCCAACGATCAAGGAAACAGGAT" +
                        "TACACCTTCATACGTCGCTTTCACCAGTGAAGGCGAGCGTCTTATCG" +
                        "GAGATGCCGCCAAGAATCAGTTGACGACCAACCCTGAAAACACCGTC" +
                        "TTCGACGCTAAGCGTCTTATCGGACGAGAATGGACGGACAGCACTGT" +
                        "TCAAGACGATATCAAGTTCTTCCCATTCAAAGTCTTGGAGAAAAATA" +
                        "GCAAGCCTCACATTCAAGTCTCCACGTCCCAGGGCAACAAAATGTTC" +
                        "GCACCCGAAGAAATCTCCGCTATGGTATTGGGTAAAATGAAAGAGAC" +
                        "GGCAGAGGCATATTTGGGAAAGAAGGTCACCCACGCCGTAGTCACAG" +
                        "TACCCGCATACTTCAACGATGCCCAGAGGCAGGCAACAAAAGATGCT" +
                        "GGAACGATTTCAGGACTCAACGTCATGAGGATCATCAACGAACCGAC" +
                        "CGCAGCAGCTATTGCTTACGGACTGGACAAGAAAGAAGGAGAAAAGA" +
                        "ACGTACTCGTTTTTGATCTCGGCGGTGGTACTTTTGATGTATCTCTT" +
                        "CTCACCATCGACAACGGAGTTTTCGAAGTCGTTTCTACAAACGGTGA" +
                        "TACTCACTTAGGAGGAGAGGACTTTGATCAAAGGGTTATGGACCACT" +
                        "TTATTAAACTGTACAAGAAGAAGAAGGGCAAGGATATCAGGAAAGAC" +
                        "AACAGGGCTGTTCAGAAACTCAGGAGGGAAGTCGAAAAAGCAAAGAG" +
                        "GGCTCTGTCTTCTAGCCACCAGGTCAGGATAGAAATTGAAAGCTTCT" +
                        "ATGACGGTGAAGACTTCTCTGAGACTCTCACTAGGGCAAAATTCGAA" +
                        "GAGCTCAACATGGACCTCTTCCGTTCCACCATGAAACCCGTTCAGAA" +
                        "GGTCCTCGAAGATGCTGACATGAACAAGAAAGACGTCGATGAAATTG" +
                        "TTTTAGTAGGAGGCAGCACCAGGATTCCAAAAGTTCAGGCCCTCGTC" +
                        "AAAGAGTTTTTCAACGGAAAAGAACCATCCCGAGGTATCAACCCCGA" +
                        "TGAAGCTGTCGCTTATGGAGCAGCAGTTCAAGCTGGAGTTTTATCTG" +
                        "GTGAACAAGACACCGATTCAATCGTCCTCCTTGATGTCAACCCTCTG" +
                        "ACCCTCGGAATCGAAACAGTCGGTGGTGTCATGACCAAACTCATCCC" +
                        "AAGGAACACAGTCATCCCGACGAAAAAATCTCAGATCTTCTCGACAG" +
                        "CTTCAGACAACCAACACACTGTCACCATTCAGGTTTATGAGGGAGAA" +
                        "AGGCCAATGACCAAAGATAATCATTTGCTCGGAAAATTCGATTTGAC" +
                        "AGGAATACCGCCTGCACCAAGGGGAGTGCCACAGATTGAAGTCACTT" +
                        "TTGAGATCGATGCCAACGGTATCCTTCAGGTGTCCGCCGAGGACAAG" +
                        "GGAACGGGCAACAGAGAGAAAATAGTCATCACAAACGACCAGAACAG" +
                        "GTTGACTCCAGACGACATCGATAGGATGATCAAGGACGCCGAGAAGT" +
                        "TCGCTGATGACGACAAGAAGCTCAAGGAGCGCGTCGAGGCCAGGAAC" +
                        "GAACTGGAGTCGTACGCCTATTCTCTCAAGAACCAGCTCGCCGACAA" +
                        "GGACAAGTTCGGATCGAAGGTGACGGATTCTGACAAGGCCAAGATGG" +
                        "AAAAAGCCATCGAAGAGAAAATCAAGTGGCTTGACGAGAACCAAGAC" +
                        "GCCGACAGTGAAGCCTTCAAGAAGCAAAAGAAAGAACTCGAAGATGT" +
                        "CGTACAGCCCATCATCTCAAAATTATACCAAGGAGGTGCTCCGCCGC" +
                        "CACCTGGAGCCGGTCCTCAATCGGAGGACGATCTTAAAGATGAGTTA" +
                        "TAAGACTGCAAAACCTTTGTGTAAATCTGTGGAACATTTCTTTGACT" +
                        "GGTGATACTTAATTTTTAAGTCAGTATTTATATATTTAAAAACAAAA" +
                        "AACCTATACATCTGAGAAGGAAATTTGTTCCTTTTTTTCAATTTAAA" +
                        "ATTTGAGTTTTTTCTTGTTTCATAAAATGTTCATTCCGCAGTTTATA" +
                        "AAGTTAATTTAAAAAACAAAAACAAAAATAAAAGACTTTGTTAACTA" +
                        "AGAAATTTATAATTTATTTGTTACTTTTTTATTTAATAATTTTTTTA" +
                        "GTGAATTGGGAATTGATGAATTACATTCAGCATTGAAAATTTATTGG" +
                        "TACCGTGTATTATAATTAATGTTGTCTGTAATTTATATAATTTCGTT" +
                        "TCATTAGGTTTTTGTTTGTCAGTTGGGCTCAATCCCAAAATTTGAGA" +
                        "ACATTCTGAAGGTGTGATAATAAAAGTTTCTTTATTTAAA";

    var ex_peptide = ">CLEC010822-PA:polypeptide ,Heat shock protein 70-2\n" +
                     "MILHFLVLLFASALAADEKNKDVGTVVGIDLGTTYSCVGVYKNGRVEIIANDQ" +
                     "GNRITPSYVAFTSEGERLIGDAAKNQLTTNPENTVFDAKRLIGREWTDSTVQD" +
                     "DIKFFPFKVLEKNSKPHIQVSTSQGNKMFAPEEISAMVLGKMKETAEAYLGKK" +
                     "VTHAVVTVPAYFNDAQRQATKDAGTISGLNVMRIINEPTAAAIAYGLDKKEGE" +
                     "KNVLVFDLGGGTFDVSLLTIDNGVFEVVSTNGDTHLGGEDFDQRVMDHFIKLY" +
                     "KKKKGKDIRKDNRAVQKLRREVEKAKRALSSSHQVRIEIESFYDGEDFSETLT" +
                     "RAKFEELNMDLFRSTMKPVQKVLEDADMNKKDVDEIVLVGGSTRIPKVQALVK" +
                     "EFFNGKEPSRGINPDEAVAYGAAVQAGVLSGEQDTDSIVLLDVNPLTLGIETV" +
                     "GGVMTKLIPRNTVIPTKKSQIFSTASDNQHTVTIQVYEGERPMTKDNHLLGKF" +
                     "DLTGIPPAPRGVPQIEVTFEIDANGILQVSAEDKGTGNREKIVITNDQNRLTP" +
                     "DDIDRMIKDAEKFADDDKKLKERVEARNELESYAYSLKNQLADKDKFGSKVTD" +
                     "SDKAKMEKAIEEKIKWLDENQDADSEAFKKQKKELEDVVQPIISKLYQGGAPP" +
                     "PPGAGPQSEDDLKDEL*\n" +
                     ">OFAS004830-PA:polypeptide ,Heat shock protein 70-2\n" +
                     "MAAGGSRPTRPAVGIDLGTTYSCVGYFDKGRVEIIANDQGNRVTPSYVAFTET" +
                     "DRIVGDAARGQAIMNPSNTVYDAKRLIGRKFDDPSVQADRKMWPFKVASKEGK" +
                     "PMIEVTYKGETRQFFPEEISSMVLSKMRETAESYIGKKVSNAVVTVPAYFNDS" +
                     "QRQATKDSGTIAGLNVLRIINEPTAAAVAYGLDKKGSGEINVLIFDLGGGTFD" +
                     "VSVLTIADGLFEVKATAGDTHLGGADFDNRMVQYFLEEFKRKTKKEVNDNKRA" +
                     "LRRLQAACERAKRVLSTATQATVEIDSFVDGIDLYSAVSRAKFEEINSDLFRG" +
                     "TLGPVEKAIRDSKIPKNRIDEIVLVGGSTRIPKIQSLLVEYFNGKELNKTINP" +
                     "DEAVAYGAAVQAAIIVGDTSDEVKDVLLLDVTPLSLGIETAGGIMTNLIPRNT" +
                     "TIPVKHSQIFSTYSDNQPGVLIQVYEGERAMTKDNNLLGTFELRGFPPAPRGV" +
                     "PQIEVAFDVDANGILNVTAQEMSTKKTSKITITNDKGRLTKAQIEKMVKEAER" +
                     "YKSEDTAARETAEAKNGLESYCYAMKNSVEEAANLGRVTEDEMKSVVRKCNET" +
                     "IMWIEANRSATKMEFEKKMRETESVCKPIATKILSRGTQQNNAGGGTPTNERG" +
                     "PVIEEAD\n" +
                     ">OFAS004738-PA:polypeptide ,Heat shock protein 70-1\n" +
                     "MPAIGIDLGTTYSCVGVWQHGKVEIIANDQGNRTTPSYVAFSDTERLIGDAAK" +
                     "NQVAMNPQNTVFDAKRLIGRKYDDPKIQDDLKHWPFRVVDCSSKPKIQVEYKG" +
                     "ETKTFAPEEISSMVLVKMKETAEAYLGGTVRDAVITVPAYFNDSQRQATKDAG" +
                     "AIAGLNVLRIINEPTAAALAYGLDKNLKGERNVLIFDLGGGTFDGPREQDHSL" +
                     "KGERNVLIFDLGGGTFDVSILTIDEGSLFEVKSTAGDTHLGGEDFDNRLVNHL" +
                     "AEEFKRKYRKDLKTNPRALRRLRTAAERAKRTLSSSTEASIEIDALFEGVDFY" +
                     "TKITRARFEELCSDLFRSTLQPVEKALQDAKLDKGLIHDVVLVGGSTRIPKIQ" +
                     "NLLQNFFNGKSLNMSINPDEAVAYGAAVQAAILSGDQSSKIQDVLLVDVAPLS" +
                     "LGIETAGGVMTKIIERNTRI";

    jQuery('.load-nucleotide').click(function() {
        jQuery('#query-textarea').val(ex_nucleotide);
        jQuery('#query-textarea').keyup();
    });

    jQuery('.load-peptide').click(function() {
        jQuery('#query-textarea').val(ex_peptide);
        jQuery('#query-textarea').keyup();
    });

    // load file into textarea
    jQuery('.query-file').change(function(evt) {
        if (window.File && window.FileReader) {
            var f = evt.target.files[0];
            console.log(f.type);
            if (f && (f.type.match('text.*') || f.type == '')) {
                var r = new FileReader();
                r.onload = function(e) {
                    var contents = e.target.result;
                    jQuery('#query-textarea').val(contents);
                    jQuery('#query-textarea').keyup();
                }
                r.readAsText(f);
            }
        }
    });

    function add_blast_options(blast_program) {
        var html_content='';

        jQuery('#fieldset-options-blast legend:first').html(blast_program+' Options');   //Show the option title
        jQuery('#fieldset-options-blast label.error').remove();
        jQuery('.parms').hide().addClass('unselected_parms');
        jQuery('.' + blast_program.toLowerCase() + '-parms').show();
        jQuery('.' + blast_program.toLowerCase() + '-parms').removeClass('unselected_parms');

        jQuery('.chk_low_complexity').change();
        jQuery('.chk_soft_masking').change();

        }

        // Validate MainBlastForm form on keyup and submit
        jQuery("#MainBlastForm").validate({
            rules: {
                'query-sequence': {
                    required: false//true
                },
                'organism-checkbox[]': {
                    required: false//true
                },
                'db-name': {
                    required: false//true
                },
                evalue: {
                    required: false,//true,
                    number: false//true
                },
                word_size: {
                    required: false,//true,
                    number: false//true
                },
                reward: {
                    required: false,//true,
                    number: false//true
                },
                penalty: {
                    required: false,//true,,
                    number: false//true
                },
                gapopen: {
                    required: false,//true,,
                    number: false//true
                },
                gapextend: {
                    required: false,//true,,
                    number: false//true
                },
                threshold: {
                    required: false,//true, ,
                    number: false//true
                }
            },
            messages: {
                'query-sequence': {
                    required: "No sequence found!"
                },
                'organism-checkbox[]': {
                    required: "Please choose at least one organism"
                },
                'db-name': {
                    required: "Please choose the type of databases"
                },
                evalue: {
                    required: "Please provide an E-value",
                    number: "Please enter a valid number"
                },
                word_size: {
                    required: "Please provide word size value",
                    number: "Please enter a valid number"
                },
                reward: {
                    required: "Please provide match score value",
                    number: "Please enter a valid number"
                },
                penalty: {
                    required: "Please provide mismatch score value",
                    number: "Please enter a valid number"
                },
                gapopen: {
                    required: "Please provide a value for gap opening penalty",
                    number: "Please enter a valid number"
                },
                gapextend: {
                    required: "Please provide a value for gap extension penalty",
                    number: "Please enter a valid number"
                },
                threshold: {
                    required: "Please provide a threshold",
                    number: "Please enter a valid number"
                }
            },
            errorPlacement: function (error, element){
                switch (element.attr('name').toString()) {
                    case 'query-sequence':
                        error.insertAfter('#legend-sequence');
                        break;
                    case 'organism-checkbox[]':
                        error.insertAfter('#legend-Organisms');
                        break;
                    case 'db-name':
                        error.insertAfter('.dataset-title');
                        break;
                    default:
                        error.insertAfter(element);
                }
        }
    });

    jQuery('input.program:radio').click(function() {
        add_blast_options(jQuery('input.program:checked').val().toUpperCase());
    });

    jQuery('.btn_reset').click(function() {
        jQuery('#query-textarea').val('');
        jQuery('#query-textarea').keyup();
        jQuery('.all-organism-checkbox').prop("checked", false);
        jQuery('.all-organism-checkbox').change();
        jQuery('.program').prop('disabled', false).removeClass('disabled-radio');
        add_blast_options('BLASTN');
        //jQuery(".query-file").replaceWith('<input type="file" name="query-file" class="query-file">');

        jQuery('label.error').remove();
        jQuery('#MainBlastForm')[0].reset();
    });

    jQuery('.chk_low_complexity').change(function() {
        if (jQuery('#'+jQuery('input.program:checked').val()+'_chk_low_complexity').is(':checked')) {
            jQuery('#low_complexity_hidden').val('yes');
        }else {
            jQuery('#low_complexity_hidden').val('no');
        }
    });

    jQuery('.chk_soft_masking').change(function() {
        if (jQuery('#'+jQuery('input.program:checked').val()+'_chk_soft_masking').is(':checked')) {
            jQuery('#soft_masking_hidden').val('true');
        }else {
            jQuery('#soft_masking_hidden').val('false');
        }
    });

    add_blast_options('BLASTN'); //show initially

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
    jQuery('.blast_submit').click(function() {
      if(jQuery("#MainBlastForm").valid()) {
        jQuery('.unselected_parms').remove();
        jQuery('#click_submit_hidden').val('true');	//Use for a back button is pressed. See line 52.
        alert("form data would be submitted.");    
        //jQuery('#MainBlastForm').submit();
    }
    });
});
  //prevention of cache pages
  jQuery(window).on('beforeunload', function(){});
  
  }).call(this);