(function() {
    
    /// <reference path="../../../templates/hmmer/main.html" />
    /////////////////////
    // DATA PROCESSING //
    /////////////////////
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
      
      ////////////////////
      // EVENT HANDLING //
      ////////////////////
      var default_data_type = jQuery('.all-dataset-checkbox').attr('dataset-type') || 'genome-assembly';
      //alert(jQuery('.all-dataset-checkbox').attr('dataset-type'));
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
          //alert(jQuery(this).attr('name'));
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
        //alert('.all-dataset-checkbox.' + default_data_type);
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
            jQuery('.peptide').attr('disabled', 'disabled').addClass('disabled-fieldset');
          } else if (jQuery('.peptide').is(':checked')) {
            db_type = 'peptide';
            jQuery('.nucleotide').attr('disabled', 'disabled').addClass('disabled-fieldset');
          }
        } else {
          if (!jQuery('.dataset-checkbox').is(':checked')) {
            db_type = '';
            jQuery('.peptide').attr('disabled', false).removeClass('disabled-fieldset');
            jQuery('.nucleotide').attr('disabled', false).removeClass('disabled-fieldset');
          }
        }
        chooseProgram();
      }
    
      var query_type = '';
      function setQueryType(qtype) {
        query_type = qtype;
        if (qtype == '') {
          jQuery('.enter-query-text').html('Enter sequence below in <a target="_blank" href="http://en.wikipedia.org/wiki/FASTA_format">FASTA</a> / IN <a target="_blank" href="http://toolkit.tuebingen.mpg.de/reformat/help_params#format">MSA (format descriptions)</a>:');
        } else if (qtype == 'invalid') {
          jQuery('.enter-query-text').html('Your sequence is invalid:');
        } else if (qtype == 'fasta') {
          jQuery('.enter-query-text').html('Your sequence is detected as fasta:');
        } else if (qtype == 'msa'){
          jQuery('.enter-query-text').html('Your sequence is not detected as fasta (phmmer disabled):');
        }
        chooseProgram();
      }
    
      //var program_selected = 'phmmer';
      var chooseProgram = _.debounce(function () {
        jQuery('.program').attr('disabled', false).removeClass('disabled-radio');
        if (query_type == 'fasta') {
          jQuery('.hmmsearch').attr('disabled', 'disabled').addClass('disabled-radio');
        } else if (query_type == 'msa') {
          jQuery('.phmmer').attr('disabled', 'disabled').addClass('disabled-radio');
        } else if (query_type == 'invalid'){
          jQuery('.hmmsearch').attr('disabled', 'disabled').addClass('disabled-radio');
          jQuery('.phmmer').attr('disabled', 'disabled').addClass('disabled-radio');
        }
        //query_type = '';
        // select first non disabled option
        jQuery('input.program:not([disabled])').first().prop('checked', true);
        program_selected = jQuery('input.program:not([disabled])').first().val();
        jQuery('.' + program_selected).mouseover();
      }, 30);
    
        //Reset all element if reload of previous page when back button is pressed
      if (jQuery('#click_submit_hidden').val() == 'true') {
            jQuery('#click_submit_hidden').val('false');
          jQuery('#query-textarea').val('');
          jQuery(".query-file").replaceWith('<input type="file" name="query-file" class="query-file">');
          jQuery('.all-organism-checkbox').prop("checked", false).attr("checked", false);
          jQuery('.all-organism-checkbox').change();
          jQuery('.program').attr('disabled', false).removeClass('disabled-radio');
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
    
      function validateFasta(fasta) {
    
        if (!fasta) { // check there is something first of all
          return false;
        }
    
        // immediately remove trailing spaces
        fasta = fasta.trim();
    
        // split on newlines...
        var lines = fasta.split('\n');
    
        // check for header
        for (i = 0; i < lines.length; i++){
          if(lines[i][0] == '>'){
            // remove one line, starting at the first position
            lines[i] = '';
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
        return /^[ABCDEFGHIKLMNPQRSTVWXYZ*\s]+jQuery/i.test(fasta);
      }
    
      function validateSTO(sto){
        if(!sto){
          return false;
        }
        sto = sto.trim();
        var row_len = 0;
        var not_empty = false;
        var lines = sto.split('\n');
        for(var i = 0; i < lines.length; i++){
          if(lines[i] == ''){
            row_len = 0;
          } else if(lines[i] == '//'){
            return true;
          } else if(lines[i].slice(0,1) != "#"){
    
            if(row_len == 0){
              row_len = lines[i].length;
    
            }else{
              //at least two sequences
              not_empty = true
              if(row_len != lines[i].length){
                return false;
              }
            }
          }
        }
        if(not_empty)
          return true;
      }
    
      function checktxt() {
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
        var normal_nucleic_codes = 'ATCGN';
        var valid_amino_codes = 'ABCDEFGHIKLMNPQRSTVWXYZ*';
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
        // Too many degenerate codes within an input nucleotide query will cause hmmer.cgi to
        // reject the input. For protein queries, too many nucleotide-like code (A,C,G,T,N) may also
        // cause similar rejection.
        if (total_count == 0) {
          setQueryType('');
        } else if(!validateFasta(jQuery('#query-textarea').val())){
          setQueryType('msa');
        } else if(validateFasta(jQuery('#query-textarea').val())){
          setQueryType('fasta');
        }
        //console.log(query_type, normal_nucleic_count, total_count);
      }
    
      var parseTextarea = _.debounce(checktxt, 30);
      jQuery('#query-textarea').keyup(parseTextarea);
    
       // hmmer program descriptions for labels and their radio buttons
      jQuery('.program.phmmer').mouseover(function() {
        jQuery('#hmmerProgramDescription').text('phmmer - Protein sequence vs. Protein sequence database');
      });
      jQuery('.program.hmmsearch').mouseover(function() {
        jQuery('#hmmerProgramDescription').text('hmmsearch - MSA vs. Protein sequence database');
      });
      jQuery('#fieldset-program').mouseleave(function() {
        jQuery('.' + jQuery('input.program:checked').val()).mouseover();
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
    
    
            var ex_nucleotide = ">Test1\n\ATCGATGCTA\n\>Test2\n\ATCGATCGATCGA"
    
            jQuery('.load-example').click(function() {
                    jQuery('#query-textarea').val(ex_nucleotide);
                    jQuery('#query-textarea').keyup();
            });
    
    
            var ex_sample_seq = ">CLEC010822-PA:polypeptide, Heat shock protein 70-2\n\
    MILHFLVLLFASALAADEKNKDVGTVVGIDLGTTYSCVGVYKNGRVEIIANDQGNRITPSYVAFTSEGERLIGDAAKNQLTTNPENTVFDAKRLIGREWTDSTVQDDIKFFPFKVLEKNSKPHIQVSTSQGNKMFAPEEISAMVLGKMKETAEAYLGKKVTHAVVTVPAYFNDAQRQATKDAGTISGLNVMRIINEPTAAAIAYGLDKKEGEKNVLVFDLGGGTFDVSLLTIDNGVFEVVSTNGDTHLGGEDFDQRVMDHFIKLYKKKKGKDIRKDNRAVQKLRREVEKAKRALSSSHQVRIEIESFYDGEDFSETLTRAKFEELNMDLFRSTMKPVQKVLEDADMNKKDVDEIVLVGGSTRIPKVQALVKEFFNGKEPSRGINPDEAVAYGAAVQAGVLSGEQDTDSIVLLDVNPLTLGIETVGGVMTKLIPRNTVIPTKKSQIFSTASDNQHTVTIQVYEGERPMTKDNHLLGKFDLTGIPPAPRGVPQIEVTFEIDANGILQVSAEDKGTGNREKIVITNDQNRLTPDDIDRMIKDAEKFADDDKKLKERVEARNELESYAYSLKNQLADKDKFGSKVTDSDKAKMEKAIEEKIKWLDENQDADSEAFKKQKKELEDVVQPIISKLYQGGAPPPPGAGPQSEDDLKDEL*\n\
    >OFAS004830-PA:polypeptide, Heat shock protein 70-2\n\
    MAAGGSRPTRPAVGIDLGTTYSCVGYFDKGRVEIIANDQGNRVTPSYVAFTETDRIVGDAARGQAIMNPSNTVYDAKRLIGRKFDDPSVQADRKMWPFKVASKEGKPMIEVTYKGETRQFFPEEISSMVLSKMRETAESYIGKKVSNAVVTVPAYFNDSQRQATKDSGTIAGLNVLRIINEPTAAAVAYGLDKKGSGEINVLIFDLGGGTFDVSVLTIADGLFEVKATAGDTHLGGADFDNRMVQYFLEEFKRKTKKEVNDNKRALRRLQAACERAKRVLSTATQATVEIDSFVDGIDLYSAVSRAKFEEINSDLFRGTLGPVEKAIRDSKIPKNRIDEIVLVGGSTRIPKIQSLLVEYFNGKELNKTINPDEAVAYGAAVQAAIIVGDTSDEVKDVLLLDVTPLSLGIETAGGIMTNLIPRNTTIPVKHSQIFSTYSDNQPGVLIQVYEGERAMTKDNNLLGTFELRGFPPAPRGVPQIEVAFDVDANGILNVTAQEMSTKKTSKITITNDKGRLTKAQIEKMVKEAERYKSEDTAARETAEAKNGLESYCYAMKNSVEEAANLGRVTEDEMKSVVRKCNETIMWIEANRSATKMEFEKKMRETESVCKPIATKILSRGTQQNNAGGGTPTNERGPVIEEAD\n\
    >OFAS004738-PA:polypeptide, Heat shock protein 70-1\n\
    MPAIGIDLGTTYSCVGVWQHGKVEIIANDQGNRTTPSYVAFSDTERLIGDAAKNQVAMNPQNTVFDAKRLIGRKYDDPKIQDDLKHWPFRVVDCSSKPKIQVEYKGETKTFAPEEISSMVLVKMKETAEAYLGGTVRDAVITVPAYFNDSQRQATKDAGAIAGLNVLRIINEPTAAALAYGLDKNLKGERNVLIFDLGGGTFDGPREQDHSLKGERNVLIFDLGGGTFDVSILTIDEGSLFEVKSTAGDTHLGGEDFDNRLVNHLAEEFKRKYRKDLKTNPRALRRLRTAAERAKRTLSSSTEASIEIDALFEGVDFYTKITRARFEELCSDLFRSTLQPVEKALQDAKLDKGLIHDVVLVGGSTRIPKIQNLLQNFFNGKSLNMSINPDEAVAYGAAVQAAILSGDQSSKIQDVLLVDVAPLSLGIETAGGVMTKIIERNTRI";
    
            jQuery('.load-example-seq').click(function() {
                    jQuery('#query-textarea').val(ex_sample_seq);
                    jQuery('#query-textarea').keyup();
            });
    
            var ex_sample_aln = "CLUSTAL O(1.2.3) multiple sequence alignment\n\n\n\
    CLEC010822-PA:polypeptide,      MILHFLVLLFASALAADEKNKDVGTVVGIDLGTTYSCVGVYKNGRVEIIANDQGNRITPS\n\
    OFAS004830-PA:polypeptide,      --------------MAAGGSRPTRPAVGIDLGTTYSCVGYFDKGRVEIIANDQGNRVTPS\n\
    OFAS004738-PA:polypeptide,      -----------------------MPAIGIDLGTTYSCVGVWQHGKVEIIANDQGNRTTPS\n\
                                                             .:************ :.:*:*********** ***\n\
    \n\
    CLEC010822-PA:polypeptide,      YVAFTSEGERLIGDAAKNQLTTNPENTVFDAKRLIGREWTDSTVQDDIKFFPFKVLEKNS\n\
    OFAS004830-PA:polypeptide,      YVAFT-ETDRIVGDAARGQAIMNPSNTVYDAKRLIGRKFDDPSVQADRKMWPFKVASKEG\n\
    OFAS004738-PA:polypeptide,      YVAFS-DTERLIGDAAKNQVAMNPQNTVFDAKRLIGRKYDDPKIQDDLKHWPFRVVDCSS\n\
                                    ****: : :*::****:.*   **.***:********:: * .:* * * :**:* . ..\n\
    \n\
    CLEC010822-PA:polypeptide,      KPHIQVSTSQGNKMFAPEEISAMVLGKMKETAEAYLGKKVTHAVVTVPAYFNDAQRQATK\n\
    OFAS004830-PA:polypeptide,      KPMIEVTYKGETRQFFPEEISSMVLSKMRETAESYIGKKVSNAVVTVPAYFNDSQRQATK\n\
    OFAS004738-PA:polypeptide,      KPKIQVEYKGETKTFAPEEISSMVLVKMKETAEAYLGGTVRDAVITVPAYFNDSQRQATK\n\
                                    ** *:*  .  .: * *****:*** **:****:*:* .* .**:********:******\n\
    \n\
    CLEC010822-PA:polypeptide,      DAGTISGLNVMRIINEPTAAAIAYGLDKKE---------------------------GEK\n\
    OFAS004830-PA:polypeptide,      DSGTIAGLNVLRIINEPTAAAVAYGLDKKGSGEINV------------------------\n\
    OFAS004738-PA:polypeptide,      DAGAIAGLNVLRIINEPTAAALAYGLDKNLKGERNVLIFDLGGGTFDGPREQDHSLKGER\n\
                                    *:*:*:****:**********:******:                               \n\
    \n\
    CLEC010822-PA:polypeptide,      NVLVFDLGGGTFDVSLLTIDNG-VFEVVSTNGDTHLGGEDFDQRVMDHFIKLYKKKKGKD\n\
    OFAS004830-PA:polypeptide,      --LIFDLGGGTFDVSVLTIADG-LFEVKATAGDTHLGGADFDNRMVQYFLEEFKRKTKKE\n\
    OFAS004738-PA:polypeptide,      NVLIFDLGGGTFDVSILTIDEGSLFEVKSTAGDTHLGGEDFDNRLVNHLAEEFKRKYRKD\n\
                                      *:***********:*** :* :*** :* ******* ***:*::::: : :*:*  *:\n\
    \n\
    CLEC010822-PA:polypeptide,      IRKDNRAVQKLRREVEKAKRALSSSHQVRIEIESFYDGEDFSETLTRAKFEELNMDLFRS\n\
    OFAS004830-PA:polypeptide,      VNDNKRALRRLQAACERAKRVLSTATQATVEIDSFVDGIDLYSAVSRAKFEEINSDLFRG\n\
    OFAS004738-PA:polypeptide,      LKTNPRALRRLRTAAERAKRTLSSSTEASIEIDALFEGVDFYTKITRARFEELCSDLFRS\n\
                                    :. : **:::*:   *:***.**:: :. :**::: :* *:   ::**:***:  ****.\n\
    \n\
    CLEC010822-PA:polypeptide,      TMKPVQKVLEDADMNKKDVDEIVLVGGSTRIPKVQALVKEFFNGKEPSRGINPDEAVAYG\n\
    OFAS004830-PA:polypeptide,      TLGPVEKAIRDSKIPKNRIDEIVLVGGSTRIPKIQSLLVEYFNGKELNKTINPDEAVAYG\n\
    OFAS004738-PA:polypeptide,      TLQPVEKALQDAKLDKGLIHDVVLVGGSTRIPKIQNLLQNFFNGKSLNMSINPDEAVAYG\n\
                                    *: **:*.:.*:.: *  :.::***********:* *: ::****. .  **********\n\
    \n\
    CLEC010822-PA:polypeptide,      AAVQAGVLSGEQDT--DSIVLLDVNPLTLGIETVGGVMTKLIPRNTVIPTKKSQIFSTAS\n\
    OFAS004830-PA:polypeptide,      AAVQAAIIVGDTSDEVKDVLLLDVTPLSLGIETAGGIMTNLIPRNTTIPVKHSQIFSTYS\n\
    OFAS004738-PA:polypeptide,      AAVQAAILSGDQSSKIQDVLLVDVAPLSLGIETAGGVMTKIIERNTRIPCKQTQTFTTYS\n\
                                    *****.:: *: .   ..::*:** **:*****.**:**::* *** ** *::* *:* *\n\
    \n\
    CLEC010822-PA:polypeptide,      DNQHTVTIQVYEGERPMTKDNHLLGKFDLTGIPPAPRGVPQIEVTFEIDANGILQVSAED\n\
    OFAS004830-PA:polypeptide,      DNQPGVLIQVYEGERAMTKDNNLLGTFELRGFPPAPRGVPQIEVAFDVDANGILNVTAQE\n\
    OFAS004738-PA:polypeptide,      DNQPAVTVQVYEGERVMTKDNNLLGTFDLTGIPPAPRGVPKIDVTFDMDANGILNVSAKD\n\
                                    ***  * :******* *****:***.*:* *:********:*:*:*::******:*:*::\n\
    \n\
    CLEC010822-PA:polypeptide,      KGTGNREKIVITNDQNRLTPDDIDRMIKDAEKFADDDKKLKERVEARNELESYAYSLKNQ\n\
    OFAS004830-PA:polypeptide,      MSTKKTSKITITNDKGRLTKAQIEKMVKEAERYKSEDTAARETAEAKNGLESYCYAMKNS\n\
    OFAS004738-PA:polypeptide,      NSSGKSKNIRIENNKGRLSKEEIDRMINEAERYKEEDDKERERIAAKNKLETYIFSIKQA\n\
                                     .: : .:* * *::.**:  :*::*:::**:: .:*   :*   *:* **:* :::*: \n\
    \n\
    CLEC010822-PA:polypeptide,      LADKDKFGSKVTDSDKAKMEKAIEEKIKWLDENQDADSEAFKKQKKELEDVVQPIISKLY\n\
    OFAS004830-PA:polypeptide,      VEEAANLGRV-TEDEMKSVVRKCNETIMWIEANRSATKMEFEKKMRETESVCKPIATKIL\n\
    OFAS004738-PA:polypeptide,      VDDAGD--KL-SEEDKNTARAKCDEAMRWLDNNSLAAKDEYEHKYEELQRDCTNFMTKMY\n\
                                    : :  .     ::.:  .     :* : *:: *  * .  :::: .* :     : :*: \n\
    \n\
    CLEC010822-PA:polypeptide,      QGGAPPPP----------GAGPQSEDDLKDEL*\n\
    OFAS004830-PA:polypeptide,      SRGTQQN--NAGGGTPTNERGPVIEEAD-----\n\
    OFAS004738-PA:polypeptide,      AGGAGSCGQQNGNNFSQQSRGPTVEEVD-----\n\
                                      *:                **  *:       ";
    
      jQuery('.load-example-aln').click(function() {
        jQuery('#query-textarea').val(ex_sample_aln);
        jQuery('#query-textarea').keyup();
      });
    
    
      // Validate MainHmmerForm form on keyup and submit
      jQuery("#MainHmmerForm").validate({
        rules: {
          'query-sequence': {
            //'textarea_valid':'',
            required: true
          },
          'organism-checkbox[]': {
            required: true
          },
          'db-name': {
            required: true
          },
          s_sequence: {
            required: true,
            //number: true
          },
          s_hit: {
            required: true,
            //number: true
          },
          r_sequence: {
            required: true,
            //number: true
          },
          r_hit: {
            required: true,
            //number: true
          },
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
          s_sequence: {
            required: "Please provide a value for significance sequence",
            number: "Please enter a valid number"
          },
          s_hit: {
            required: "Please provide a value for significance hit",
            number: "Please enter a valid number"
          },
          r_sequence: {
            required: "Please provide a value for report sequence",
            number: "Please enter a valid number"
          },
          r_hit: {
            required: "Please provide a value for report hit",
            number: "Please enter a valid number"
          },
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
    
        jQuery('.cutoff').change(function(){
            if(jQuery('.cutoff:checked').val() == 'bitscore'){
                jQuery('#s_sequence').val('25');
                jQuery('#s_hit').val('22');
                jQuery('#r_sequence').val('7');
                jQuery('#r_hit').val('5');
            }
    
            if(jQuery('.cutoff:checked').val() == 'evalue'){
                jQuery('#s_sequence').val('0.01');
                jQuery('#s_hit').val('0.03');
                jQuery('#r_sequence').val('0.01');
                jQuery('#r_hit').val('0.03');
            }
        });
    
        jQuery('.btn_reset').click(function() {
            query_type = '';
            jQuery('.program').attr('disabled', false).removeClass('disabled-radio');
            jQuery('#query-textarea').val('');
            jQuery('.all-organism-checkbox').prop("checked", false).attr("checked", false);
            jQuery('.all-organism-checkbox').change();
            jQuery(".query-file").val('');
            jQuery('label.error').remove();
        jQuery('.cutoff').change();
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
      //checktxt();
      jQuery('#hmmer_submit').click(function() {
        if(jQuery("#MainHmmerForm").valid() || true) { //todo: remove this || true when fixing validation!
          jQuery('#click_submit_hidden').val('true');
          if(jQuery('input[name=program]:checked', '#MainHmmerForm').val() == 'hmmsearch'){
            //alert("form data would be submitted.");      
            jQuery('#MainHmmerForm').submit();
          }else if(jQuery('input[name=program]:checked', '#MainHmmerForm').val() == 'phmmer'){
            jQuery('#click_submit_hidden').val('true');
            //alert("form data would be submitted.");
            jQuery('#MainHmmerForm').submit();
          };
        }
        });
    });
    
    //prevention of cache pages
    jQuery(window).on("unload",function () { });
    
    }).call(this);