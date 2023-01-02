<?php

namespace Drupal\custom_blast\Controller;

use \Drupal\Core\Controller\ControllerBase;

class CustomBlast extends ControllerBase{

    public function get_api_data($endpoint = "blast_stub"){
        if($endpoint === "blast_stub") {
            $api_data = [
                ["Genome Assembly", "Nucleotide", "GCF_001937115.1_Atum_1.0_genomic_RefSeqIDs.fna", "Aethina tumida", "Aethina tumida genome assembly GCF_001937115.1"],
                ["Transcript", "Nucleotide", "GCF_001937115.1_Atum_1.0_rna.fna", "Aethina tumida", "Aethina tumida - NCBI annotation release 100, RNA"],
                ["Transcript", "Nucleotide", "GCF_001937115.1_Atum_1.0_rna_from_genomic.fna", "Aethina tumida", "Aethina tumida - NCBI annotation release 100, RNA predicted from genomic sequence"],
                ["Protein", "Peptide", "GCF_001937115.1_Atum_1.0_protein.faa", "Aethina tumida", "Aethina tumida - NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "Aplan.scaffolds.50_new_ids.fa", "Agrilus planipennis", "Aplan.scaffolds.50_new_ids.fa"],
                ["Transcript", "Nucleotide", "APLA_new_ids.fna", "Agrilus planipennis", "APLA_new_ids.fna"],
                ["Transcript", "Nucleotide", "GCF_000699045.1_Apla_1.0_cds_from_genomic.fna", "Agrilus planipennis", "Agrilus planipennis NCBI annotation release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_000699045.1_Apla_1.0_rna.fna", "Agrilus planipennis", "Agrilus planipennis NCBI annotation release 100, RNA"],
                ["Transcript", "Nucleotide", "GCF_000699045.1_Apla_1.0_rna_from_genomic.fna", "Agrilus planipennis", "Agrilus planipennis NCBI annotation release 100, RNA from genomic"],
                ["Protein", "Peptide", "APLA_new_ids.faa", "Agrilus planipennis", "APLA_new_ids.faa"],
                ["Protein", "Peptide", "GCF_000699045.1_Apla_1.0_protein.faa", "Agrilus planipennis", "Agrilus planipennis NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "680683_ref_ASM118610v1_chrUn_refseq_IDS.fa", "Amyelois transitella", "Amyelois transitella genome assembly ASM118610v1"],
                ["Transcript", "Nucleotide", "ref_ASM118610v1_rna.fa", "Amyelois transitella", "Amyelois transitella - NCBI annotation release 100, RNA"],
                ["Protein", "Peptide", "ref_ASM118610v1_protein.fa", "Amyelois transitella", "Amyelois transitella - NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "Agla_Btl03082013.genome_new_ids.fa", "Anoplophora glabripennis", "Agla_Btl03082013.genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "GCF_000390285.2_Agla_2.0_cds_from_genomic.fna", "Anoplophora glabripennis", "NCBI Anoplophora glabripennis Annotation Release 101, cds from genomic"],
                ["Transcript", "Nucleotide", "GCF_000390285.2_Agla_2.0_rna_from_genomic.fna", "Anoplophora glabripennis", "NCBI Anoplophora glabripennis Annotation Release 101, rna from genomic"],
                ["Transcript", "Nucleotide", "anogla_OGSv1.3_cds.fa", "Anoplophora glabripennis", "Anoplophora glabripennis OGSv1.3, CDS"],
                ["Transcript", "Nucleotide", "anogla_OGSv1.3_trans.fa", "Anoplophora glabripennis", "Anoplophora glabripennis OGSv1.3, RNA"],
                ["Protein", "Peptide", "GCF_000390285.2_Agla_2.0_translated_cds.faa", "Anoplophora glabripennis", "NCBI Anoplophora glabripennis Annotation Release 101, translated CDS"],
                ["Protein", "Peptide", "anogla_OGSv1.3_pep.fa", "Anoplophora glabripennis", "Anoplophora glabripennis OGSv1.3, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_022605725.1_icAntGran1.3_genomic.fna", "Anthonomus grandis", "Anthonomus grandis grandis genome assembly, icAntGran1.3"],
                ["Transcript", "Nucleotide", "GCF_022605725.1_icAntGran1.3_cds_from_genomic.fna", "Anthonomus grandis", "Anthonomus grandis grandis NCBI Annotation release 100, transcripts"],
                ["Genome Assembly", "Nucleotide", "gcf_000002195.4_amel_4.5_genomic.fna", "Apis mellifera", "Apis mellifera Genome assembly 4.5, GCF_000002195.4"],
                ["Transcript", "Nucleotide", "Apis mellifera OGSv3.3, CDS", "Apis mellifera", "Apis mellifera OGSv3.3, CDS"],
                ["Transcript", "Nucleotide", "Apis mellifera OGSv3.3, cDNA", "Apis mellifera", "Apis mellifera OGSv3.3, cDNA"],
                ["Transcript", "Nucleotide", "GCF_000002195.4_Amel_4.5_cds_from_genomic.fna", "Apis mellifera", "Apis mellifera NCBI annotation release 103, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_000002195.4_Amel_4.5_rna_from_genomic.fna", "Apis mellifera", "Apis mellifera NCBI annotation release 103, RNA from genomic"],
                ["Protein", "Peptide", "Apis mellifera OGSv3.3, peptides", "Apis mellifera", "Apis mellifera OGSv3.3, peptides"],
                ["Protein", "Peptide", "GCF_000002195.4_Amel_4.5_translated_cds.faa", "Apis mellifera", "Apis mellifera NCBI annotation release 103, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Aros01112013-genome_new_ids.fa", "Athalia rosae", "Aros01112013-genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "AROS_new_ids.fna", "Athalia rosae", "AROS_new_ids.fna"],
                ["Transcript", "Nucleotide", "athros_OGSv1.2_cds.fa", "Athalia rosae", "Athalia rosae OGSv1.2, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "athros_OGSv1.2_trans.fa", "Athalia rosae", "Athalia rosae OGSv1.2, transcripts"],
                ["Protein", "Peptide", "AROS_new_ids.faa", "Athalia rosae", "AROS_new_ids.faa"],
                ["Protein", "Peptide", "athros_OGSv1.2_pep.fa", "Athalia rosae", "Athalia rosae OGSv1.2, peptides"],
                ["Genome Assembly", "Nucleotide", "28588_ref_asm80634v1_chrun_refseq_ids.fa", "Bactrocera cucurbitae", "Bactrocera cucurbitae NCBI-RefSeq scaffolds"],
                ["Transcript", "Nucleotide", "baccuc_v100_rna.fa", "Bactrocera cucurbitae", "Bactrocera cucurbitae - NCBI annotation release 100, RNA"],
                ["Protein", "Peptide", "baccuc_v100_protein.fa", "Bactrocera cucurbitae", "Bactrocera cucurbitae - NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "27457_ref_asm78921v2_chrun_refseq_ids.fa", "Bactrocera dorsalis", "Bactrocera dorsalis - NCBI-RefSeq scaffolds"],
                ["Transcript", "Nucleotide", "BDOR_v1-blast.mrna.fasta", "Bactrocera dorsalis", "Bactrocera dorsalis BDOR_v1 transcripts - MAKER analysis"],
                ["Transcript", "Nucleotide", "bacdor_v100_rna.fa", "Bactrocera dorsalis", "Bactrocera dorsalis - NCBI annotation release 100, RNA"],
                ["Protein", "Peptide", "BDOR_v1-blast.proteins.fasta", "Bactrocera dorsalis", "Bactrocera dorsalis BDOR_v1 proteins - MAKER analysis"],
                ["Protein", "Peptide", "bacdor_v100_protein.fa", "Bactrocera dorsalis", "Bactrocera dorsalis - NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "104688_ref_gapfilled_joined_lt9474.gt500.covgt10_chrMT_and_UN_refseq_IDs.fa", "Bactrocera oleae", "Bactrocera oleae genome assembly gapfilled_joined_lt9474.gt500.covgt10, genomic and mitochondrial scaffolds"],
                ["Transcript", "Nucleotide", "104688_ref_gapfilled_joined_lt9474.gt500.covgt10_rna.fa", "Bactrocera oleae", "Bactrocera oleae - NCBI annotation release 100, RNA"],
                ["Transcript", "Nucleotide", "Boleae2.gene_structures_post_PASA_updates.116290_RefSeq_ids_updated_cDNA.fna", "Bactrocera oleae", "Bactrocera oleae JAMg OGSv1, cDNA"],
                ["Protein", "Peptide", "104688_ref_gapfilled_joined_lt9474.gt500.covgt10_protein.fa", "Bactrocera oleae", "Bactrocera oleae - NCBI annotation release 100, Proteins"],
                ["Protein", "Peptide", "Boleae2.gene_structures_post_PASA_updates.116290_RefSeq_ids_updated_prot.faa", "Bactrocera oleae", "Bactrocera oleae JAMg OGS v1, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_001854935.1_ASM185493v1_genomic.fna", "Bemisia tabaci", "Bemisia tabaci genome assembly GCF_001854935.1 (ASM185493v1)"],
                ["Transcript", "Nucleotide", "GCF_001854935.1_ASM185493v1_rna.fna", "Bemisia tabaci", "Bemisia tabaci NCBI annotation release 100, RNA"],
                ["Transcript", "Nucleotide", "MEAM1_v1.2-GCF_001854935.1_cds.fa", "Bemisia tabaci", "Bemisia tabaci OGS MEAM1_v1.2, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "MEAM1_v1.2-GCF_001854935.1_trans.fa", "Bemisia tabaci", "Bemisia tabaci OGS MEAM1_v1.2, transcripts"],
                ["Protein", "Peptide", "GCF_001854935.1_ASM185493v1_protein.faa", "Bemisia tabaci", "Bemisia tabaci NCBI annotation release 100, proteins"],
                ["Protein", "Peptide", "MEAM1_v1.2-GCF_001854935.1_pep.fa", "Bemisia tabaci", "Bemisia tabaci OGS MEAM1_v1.2, proteins"],
                ["Genome Assembly", "Nucleotide", "Blattella_germanica_scaffolds", "Blattella germanica", "Blattella_germanica_scaffolds"],
                ["Transcript", "Nucleotide", "blager_OGSv1.2_cds.fa", "Blattella germanica", "Blattella germanica OGSv1.2, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "blager_OGSv1.2_trans.fa", "Blattella germanica", "Blattella germanica OGSv1.2, transcripts"],
                ["Protein", "Peptide", "blager_OGSv1.2_pep.fa", "Blattella germanica", "Blattella germanica OGSv1.2, peptides"],
                ["Genome Assembly", "Nucleotide", "GCF_000188095.2_BIMP_2.1_genomic.fna", "Bombus impatiens", "Bombus impatiens genome assembly GCF_001483705.1"],
                ["Transcript", "Nucleotide", "GCF_000188095.2_BIMP_2.1_cds_from_genomic.fna", "Bombus impatiens", "Bombus impatiens NCBI annotation release 102, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_000188095.2_BIMP_2.1_rna_from_genomic.fna", "Bombus impatiens", "Bombus impatiens NCBI annotation release 102, RNA from genomic"],
                ["Transcript", "Nucleotide", "bomimp_OGSv1.1_cds_new.fa", "Bombus impatiens", "Bombus impatiens OGSv1.1, CDS"],
                ["Protein", "Peptide", "GCF_000188095.2_BIMP_2.1_translated_cds.faa", "Bombus impatiens", "Bombus impatiens NCBI annotation release 102, peptide"],
                ["Protein", "Peptide", "bomimp_OGSv1.1_pep_new.fa", "Bombus impatiens", "Bombus impatiens OGSv1.1, peptlde"],
                ["Genome Assembly", "Nucleotide", "GCF_000214255.1_Bter_1.0_genomic.fna", "Bombus terrestris", "Bombus terrestris genome assembly GCF_000214255.1"],
                ["Transcript", "Nucleotide", "Bombus_terrestris_v1.4.cds.fa", "Bombus terrestris", "gene set v1.4, CDS"],
                ["Transcript", "Nucleotide", "GCF_000214255.1_Bter_1.0_cds_from_genomic.fna", "Bombus terrestris", "Bombus terrestris NCBI annotation release 102, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_000214255.1_Bter_1.0_rna_from_genomic.fna", "Bombus terrestris", "Bombus terrestris NCBI annotation release 102, RNA from genomic"],
                ["Protein", "Peptide", "Bombus_terrestris_v1.4.pep.fa", "Bombus terrestris", "gene set v1.4, peptide"],
                ["Protein", "Peptide", "GCF_000214255.1_Bter_1.0_translated_cds.faa", "Bombus terrestris", "Bombus terrestris NCBI annotation release 102, Peptide"],
                ["Genome Assembly", "Nucleotide", "GCF_014529535.1_BU_Bcop_v1_genomic.fna", "Bradysia coprophila", "Bradysia coprophila genome assembly, BU_Bcop_v1"],
                ["Transcript", "Nucleotide", "Bradysia_coprophila.Bcop_v1.0_transcripts_with_putative_function.fasta", "Bradysia coprophila", "Bradysia_coprophila.Bcop_v1.0, transcripts"],
                ["Transcript", "Nucleotide", "GCF_014529535.1_BU_Bcop_v1_rna_from_genomic.fna", "Bradysia coprophila", "Bradysia coprophila NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "Bradysia_coprophila.Bcop_v1.0_proteins_with_putative_function.fasta", "Bradysia coprophila", "Bradysia_coprophila.Bcop_v1.0, proteins"],
                ["Protein", "Peptide", "GCF_014529535.1_BU_Bcop_v1_translated_cds.faa", "Bradysia coprophila", "Bradysia coprophila NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Catajapyx aquilonaris_scaffolds", "Catajapyx aquilonaris", "Catajapyx aquilonaris_scaffolds"],
                ["Transcript", "Nucleotide", "Catajapyx aquilonaris_BCM_v0.5.3_transcripts", "Catajapyx aquilonaris", "Catajapyx aquilonaris_BCM_v0.5.3_transcripts"],
                ["Protein", "Peptide", "Catajapyx aquilonaris_BCM_v0.5.3_proteins", "Catajapyx aquilonaris", "Catajapyx aquilonaris_BCM_v0.5.3_proteins"],
                ["Genome Assembly", "Nucleotide", "Cscul.scaffolds.50_new_ids.fa", "Centruroides sculpturatus", "Centruroides sculpturatus genome assembly (BCM)"],
                ["Transcript", "Nucleotide", "CSCU_new_ids.fna", "Centruroides sculpturatus", "Centruroides sculpturatus Maker transcripts v0.5.3 (BCM)"],
                ["Protein", "Peptide", "CSCU_new_ids.faa", "Centruroides sculpturatus", "Centruroides sculpturatus Maker proteins v0.5.3 (BCM)"],
                ["Genome Assembly", "Nucleotide", "GCF_000341935.1_Ccin1_genomic.fna", "Cephus cinctus", "Cephus cinctus genome assembly Ccin1 (GCF_000341935.1)"],
                ["Transcript", "Nucleotide", "cepcin_OGSv1.1_cds.fa", "Cephus cinctus", "Cephus cinctus cepcin_OGSv1.1, CDS"],
                ["Transcript", "Nucleotide", "cepcin_OGSv1.1_trans.fa", "Cephus cinctus", "Cephus cinctus cepcin_OGSv1.1, RNA"],
                ["Protein", "Peptide", "cepcin_OGSv1.1_pep.fa", "Cephus cinctus", "Cephus cinctus cepcin_OGSv1.1, proteins"],
                ["Genome Assembly", "Nucleotide", "Ccap01172013-genome_new_ids.fa", "Ceratitis capitata", "Ccap01172013-genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "Cercap_NCBI_RefSeq.fna", "Ceratitis capitata", "Cercap_NCBI_RefSeq.fna"],
                ["Transcript", "Nucleotide", "cercap_JAMG_v1.cds", "Ceratitis capitata", "cercap_JAMG_v1.cds"],
                ["Protein", "Peptide", "Cercap_NCBI_RefSeq.faa", "Ceratitis capitata", "Cercap_NCBI_RefSeq.faa"],
                ["Protein", "Peptide", "cercap_JAMG_v1.pep", "Ceratitis capitata", "cercap_JAMG_v1.pep"],
                ["Genome Assembly", "Nucleotide", "GCF_013357705.1_ASM1335770v1_genomic.fna", "Chelonus insularis", "Chelonus insularis genome assembly GCF_013357705.1"],
                ["Transcript", "Nucleotide", "GCF_013357705.1_ASM1335770v1_cds_from_genomic-idupdate.fna", "Chelonus insularis", "Chelonus insularis NCBI Annotation Release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_013357705.1_ASM1335770v1_rna_from_genomic-idupdate.fna", "Chelonus insularis", "Chelonus insularis NCBI Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_013357705.1_ASM1335770v1_translated_cds-idupdate.faa", "Chelonus insularis", "Chelonus insularis NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Clec_Bbug02212013.genome_new_ids.fa", "Cimex lectularius", "Clec_Bbug02212013.genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "GCF_000648675.2_Clec_2.1_cds_from_genomic.fna", "Cimex lectularius", "Cimex lectularius NCBI annotation release 101, cds from genomic"],
                ["Transcript", "Nucleotide", "GCF_000648675.2_Clec_2.1_rna_from_genomic.fna", "Cimex lectularius", "Cimex lectularius NCBI annotation release 101, rna from genomic"],
                ["Transcript", "Nucleotide", "cimlec_OGSv1.3_cds.fa", "Cimex lectularius", "Cimex lectularius OGSv1.3, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "cimlec_OGSv1.3_trans.fa", "Cimex lectularius", "Cimex lectularius OGSv1.3, transcripts"],
                ["Protein", "Peptide", "GCF_000648675.2_Clec_2.1_translated_cds.faa", "Cimex lectularius", "Cimex lectularius NCBI annotation release 101, peptide"],
                ["Protein", "Peptide", "cimlec_OGSv1.3_pep.fa", "Cimex lectularius", "Cimex lectularius OGSv1.3, peptides"],
                ["Genome Assembly", "Nucleotide", "GCA_002778355.1_ASM277835v1_genomic_over_1000.fna", "Clitarchus hookeri", "Clitarchus hookeri genome assembly GCA_002778355.1 - sequences larger 1000 bp, with genome browser connection"],
                ["Transcript", "Nucleotide", "Clitarchus_hookeri_Maker_annotations_cds.fa", "Clitarchus hookeri", "Clitarchus hookeri Maker annotations, CDS"],
                ["Transcript", "Nucleotide", "Clitarchus_hookeri_Maker_annotations_trans.fa", "Clitarchus hookeri", "Clitarchus hookeri Maker annotations, transcripts"],
                ["Protein", "Peptide", "Clitarchus_hookeri_Maker_annotations_pep.fa", "Clitarchus hookeri", "Clitarchus hookeri Maker annotations, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_009176525.2_AAFC_CNas_1.1_genomic.fna", "Contarinia nasturtii", "Contarinia nasturtii genome assembly GCF_009176525.2"],
                ["Transcript", "Nucleotide", "GCF_009176525.2_AAFC_CNas_1.1_cds_from_genomic-idupdate.fna", "Contarinia nasturtii", "Contarinia nasturtii NCBI Annotation Release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_009176525.2_AAFC_CNas_1.1_rna_from_genomic-idupdate.fna", "Contarinia nasturtii", "Contarinia nasturtii NCBI Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_009176525.2_AAFC_CNas_1.1_translated_cds-idupdate.faa", "Contarinia nasturtii", "Contarinia nasturtii NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Cflo.scaffolds_new_ids.fa", "Copidosoma floridanum", "Cflo.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "CFLO_new_ids.fna", "Copidosoma floridanum", "CFLO_new_ids.fna"],
                ["Protein", "Peptide", "CFLO_new_ids.faa", "Copidosoma floridanum", "CFLO_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCF_001412515.2_Dall2.0_genomic.fna", "Diachasma alloeum", "Diachasma alloeum genome assembly GCF_001412515.2"],
                ["Transcript", "Nucleotide", "GCF_001412515.2_Dall2.0_cds_from_genomic-idupdate.fna", "Diachasma alloeum", "Diachasma alloeum NCBI Annotation Release 101, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_001412515.2_Dall2.0_rna_from_genomic-idupdate.fna", "Diachasma alloeum", "Diachasma alloeum NCBI Annotation Release 101, RNA from genomic"],
                ["Protein", "Peptide", "GCF_001412515.2_Dall2.0_translated_cds-idupdate.faa", "Diachasma alloeum", "Diachasma alloeum NCBI Annotation Release 101, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Diacit_RefSeq_scaffolds_version_1.1", "Diaphorina citri", "NCBI-diaci1.1 (Current RefSeq assembly version)"],
                ["Genome Assembly", "Nucleotide", "diaci1.1_new_ids.fa", "Diaphorina citri", "diaci1.1 (Legacy assembly version)"],
                ["Transcript", "Nucleotide", "Dcitr_OGSv1.0_cds.fa", "Diaphorina citri", "Diaphorina citri OGSv1.0, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "Dcitr_OGSv1.0_rna.fa", "Diaphorina citri", "Diaphorina citri OGSv1.0, transcripts"],
                ["Transcript", "Nucleotide", "Diacit_International_psyllid_consortium_transcripts_v1", "Diaphorina citri", "Diacit_International_psyllid_consortium_transcripts_v1"],
                ["Transcript", "Nucleotide", "Diacit_RefSeq_transcripts_Release_100", "Diaphorina citri", "Diacit_RefSeq_transcripts_Release_100"],
                ["Protein", "Peptide", "Dcitr_OGSv1.0_pep.fa", "Diaphorina citri", "Diaphorina citri OGSv1.0, proteins"],
                ["Protein", "Peptide", "Diacit_International_psyllid_consortium_proteins_v1", "Diaphorina citri", "Diacit_International_psyllid_consortium_proteins_v1"],
                ["Protein", "Peptide", "Diacit_RefSeq_proteins_Release_100", "Diaphorina citri", "Diacit_RefSeq_proteins_Release_100"],
                ["Genome Assembly", "Nucleotide", "GCF_021155765.1_iyDipSimi1.1_genomic.fna", "Diprion similis", "Diprion similis genome assembly, DipSimi1.1"],
                ["Transcript", "Nucleotide", "GCF_021155765.1_iyDipSimi1.1_cds_from_genomic.fna", "Diprion similis", "\u2018Diprion similis NCBI Annotation release 100, CDS\u2019"],
                ["Transcript", "Nucleotide", "GCF_021155765.1_iyDipSimi1.1_rna_from_genomic.fna", "Diprion similis", "Diprion similis NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021155765.1_iyDipSimi1.1_translated_cds.faa", "Diprion similis", "Diprion similis NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_000233415.1_Dbia_2.0_genomic.fna", "Drosophila biarmipes", "Drosophila biarmipes genome assembly GCF_000233415.1"],
                ["Transcript", "Nucleotide", "DBIA.fna", "Drosophila biarmipes", "DBIA.fna"],
                ["Transcript", "Nucleotide", "GCF_000233415.1_Dbia_2.0_cds_from_genomic.fna", "Drosophila biarmipes", "Drosophila biarmipes NCBI annotation release 101, CDS predicted from genomic sequence\r\n"],
                ["Transcript", "Nucleotide", "GCF_000233415.1_Dbia_2.0_rna.fna", "Drosophila biarmipes", "Drosophila biarmipes NCBI annotation release 101, RNA"],
                ["Transcript", "Nucleotide", "GCF_000233415.1_Dbia_2.0_rna_from_genomic.fna", "Drosophila biarmipes", "Drosophila biarmipes NCBI annotation release 101, RNA predicted from genomic sequence\r\n"],
                ["Protein", "Peptide", "DBIA.faa", "Drosophila biarmipes", "DBIA.faa"],
                ["Protein", "Peptide", "GCF_000233415.1_Dbia_2.0_protein.faa", "Drosophila biarmipes", "Drosophila biarmipes NCBI annotation release 101, proteins\r\n"],
                ["Genome Assembly", "Nucleotide", "GCF_018153845.1_ASM1815384v1_genomic.fna", "Drosophila bipectinata", "Drosophila bipectinata genome assembly, ASM1815384v1"],
                ["Transcript", "Nucleotide", "GCF_018153845.1_ASM1815384v1_cds_from_genomic.fna", "Drosophila bipectinata", "Drosophila bipectinata NCBI Annotation release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018153845.1_ASM1815384v1_rna_from_genomic.fna", "Drosophila bipectinata", "Drosophila bipectinata NCBI Annotation release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018153845.1_ASM1815384v1_translated_cds.faa", "Drosophila bipectinata", "Drosophila bipectinata NCBI Annotation release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018152505.1_ASM1815250v1_genomic.fna", "Drosophila elegans", "Drosophila elegans genome assembly, ASM1815250v1"],
                ["Transcript", "Nucleotide", "GCF_018152505.1_ASM1815250v1_cds_from_genomic.fna", "Drosophila elegans", "Drosophila elegans NCBI Annotation Release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018152505.1_ASM1815250v1_rna_from_genomic.fna", "Drosophila elegans", "Drosophila elegans NCBI Annotation Release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018152505.1_ASM1815250v1_translated_cds.faa", "Drosophila elegans", "Drosophila elegans NCBI Annotation Release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018153835.1_ASM1815383v1_genomic.fna", "Drosophila eugracilis", "Drosophila eugracilis genome assembly, ASM1815383v1"],
                ["Transcript", "Nucleotide", "GCF_018153835.1_ASM1815383v1_cds_from_genomic.fna", "Drosophila eugracilis", "Drosophila eugracilis NCBI Annotation Release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018153835.1_ASM1815383v1_rna_from_genomic.fna", "Drosophila eugracilis", "Drosophila eugracilis NCBI Annotation Release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018153835.1_ASM1815383v1_translated_cds.faa", "Drosophila eugracilis", "Drosophila eugracilis NCBI Annotation Release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018152265.1_ASM1815226v1_genomic.fna", "Drosophila ficusphila", "Drosophila ficusphila genome assembly, ASM1815226v1"],
                ["Transcript", "Nucleotide", "GCF_018152265.1_ASM1815226v1_cds_from_genomic.fna", "Drosophila ficusphila", "Drosophila ficusphila NCBI Annotation release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018152265.1_ASM1815226v1_rna_from_genomic.fna", "Drosophila ficusphila", "Drosophila ficusphila NCBI Annotation release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018152265.1_ASM1815226v1_translated_cds.faa", "Drosophila ficusphila", "Drosophila ficusphila NCBI Annotation release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018152535.1_ASM1815253v1_genomic.fna", "Drosophila kikkawai", "Drosophila kikkawai genome assembly, ASM1815253v1"],
                ["Transcript", "Nucleotide", "GCF_018152535.1_ASM1815253v1_cds_from_genomic.fna", "Drosophila kikkawai", "Drosophila kikkawai NCBI Annotation Release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018152535.1_ASM1815253v1_rna_from_genomic.fna", "Drosophila kikkawai", "Drosophila kikkawai NCBI Annotation Release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018152535.1_ASM1815253v1_translated_cds.faa", "Drosophila kikkawai", "Drosophila kikkawai NCBI Annotation Release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018152115.1_ASM1815211v1_genomic.fna", "Drosophila rhopaloa", "Drosophila rhopaloa genome assembly, ASM1815211v1"],
                ["Transcript", "Nucleotide", "GCF_018152115.1_ASM1815211v1_cds_from_genomic-idupdate.fna", "Drosophila rhopaloa", "Drosophila rhopaloa NCBI Annotation release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018152115.1_ASM1815211v1_rna_from_genomic-idupdate.fna", "Drosophila rhopaloa", "Drosophila rhopaloa NCBI Annotation release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018152115.1_ASM1815211v1_translated_cds-idupdate.faa", "Drosophila rhopaloa", "Drosophila rhopaloa NCBI Annotation release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_018152695.1_ASM1815269v1_genomic.fna", "Drosophila takahashii", "Drosophila takahashii genome assembly, ASM1815269v1"],
                ["Transcript", "Nucleotide", "GCF_018152695.1_ASM1815269v1_cds_from_genomic-idupdate.fna", "Drosophila takahashii", "Drosophila takahashii NCBI Annotation release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_018152695.1_ASM1815269v1_rna_from_genomic-idupdate.fna", "Drosophila takahashii", "Drosophila takahashii NCBI Annotation release 102, transcripts"],
                ["Protein", "Peptide", "GCF_018152695.1_ASM1815269v1_translated_cds-idupdate.faa", "Drosophila takahashii", "Drosophila takahashii NCBI Annotation release 102, translated CDS"],
                ["Genome Assembly", "Nucleotide", "178035_ref_ASM127255v1_chrUn_RefSeqIDs.fa", "Dufourea novaeangliae", "Dufourea novaeangliae RefSeq assembly, ASM127255v1"],
                ["Transcript", "Nucleotide", "Dufourea_novaeangliae_v1.1_mapped-to-RefSeq_CDS.fna", "Dufourea novaeangliae", "Dufourea novaeangliae v1.1 coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "NCBI_Dufourea_novaeangliae_Annotation_Release_100_rna.fa", "Dufourea novaeangliae", "NCBI Dufourea novaeangliae Annotation Release 100, RNA"],
                ["Protein", "Peptide", "Dufourea_novaeangliae_v1.1_mapped-to-RefSeq_peptide.faa", "Dufourea novaeangliae", "Dufourea novaeangliae v1.1, peptide sequences"],
                ["Protein", "Peptide", "NCBI_Dufourea_novaeangliae_Annotation_Release_100_protein.fa", "Dufourea novaeangliae", "NCBI Dufourea novaeangliae Annotation Release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_000507165.2_Edan_2.0_genomic.fna", "Ephemera danica", "Ephemera danica genome assembly GCA_000507165.2"],
                ["Transcript", "Nucleotide", "ephdan_OGSv1.0_cds.fa", "Ephemera danica", "Ephemera danica ephdan_OGSv1.0, CDS"],
                ["Transcript", "Nucleotide", "ephdan_OGSv1.0_trans.fa", "Ephemera danica", "Ephemera danica ephdan_OGSv1.0, transcripts"],
                ["Protein", "Peptide", "ephdan_OGSv1.0_pep.fa", "Ephemera danica", "Ephemera danica ephdan_OGSv1.0, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_001483705.1_ASM148370v1_genomic.fna", "Eufriesea mexicana", "Eufriesea mexicana genome assembly GCF_001483705.1"],
                ["Transcript", "Nucleotide", "Eufriesea mexicana NCBI annotation release 100, Transcript", "Eufriesea mexicana", "Eufriesea mexicana NCBI annotation release 100, Transcript"],
                ["Transcript", "Nucleotide", "Eufriesea mexicana OGSv1.2, CDS", "Eufriesea mexicana", "Eufriesea mexicana OGSv1.2, CDS"],
                ["Transcript", "Nucleotide", "Eufriesea mexicana OGSv1.2, Transcript", "Eufriesea mexicana", "Eufriesea mexicana OGSv1.2, Transcript"],
                ["Transcript", "Nucleotide", "GCF_001483705.1_ASM148370v1_cds_from_genomic.fna", "Eufriesea mexicana", "Eufriesea mexicana NCBI annotation release 100, CDS"],
                ["Protein", "Peptide", "Eufriesea mexicana NCBI annotation release 100, Peptide", "Eufriesea mexicana", "Eufriesea mexicana NCBI annotation release 100, Peptide"],
                ["Protein", "Peptide", "Eufriesea mexicana OGSv1.2, peptide", "Eufriesea mexicana", "Eufriesea mexicana OGSv1.2, peptide"],
                ["Genome Assembly", "Nucleotide", "NIJG01_GenBankIDs.fa", "Euglossa dilemma", "Euglossa dilemma genome assembly NIJG01 (GCA_002201625.1)"],
                ["Transcript", "Nucleotide", "Edil_v1.0_transcripts.fa", "Euglossa dilemma", "Euglossa dilemma v1.0, transcripts "],
                ["Protein", "Peptide", "Edil_v1.0_peptide.fa", "Euglossa dilemma", "Euglossa dilemma v1.0, proteins "],
                ["Genome Assembly", "Nucleotide", "Eaff_11172013.genome_new_ids.fa", "Eurytemora affinis", "Eaff_11172013.genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "EAFF_new_ids.fna", "Eurytemora affinis", "EAFF_new_ids.fna"],
                ["Protein", "Peptide", "EAFF_new_ids.faa", "Eurytemora affinis", "EAFF_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "64838_ref_asm80636v1_chrun_refseq_ids.fa", "Fopius arisanus", "Fopius arisanus NCBI-RefSeq scaffolds"],
                ["Transcript", "Nucleotide", "fopari_v100_rna.fa", "Fopius arisanus", "Fopius arisanus - NCBI annotation release 100, RNA"],
                ["Protein", "Peptide", "fopari_v100_protein.fa", "Fopius arisanus", "Fopius arisanus - NCBI annotation release 100, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_000697945.4_Focc_3.0_genomic.fna", "Frankliniella occidentalis", "Frankliniella occidentalis genome assembly GCA_000697945.4"],
                ["Transcript", "Nucleotide", "fraocc_OGSv1.1_cds.fa", "Frankliniella occidentalis", "Frankliniella occidentals Official Gene Set v1.1, CDS"],
                ["Transcript", "Nucleotide", "fraocc_OGSv1.1_trans.fa", "Frankliniella occidentalis", "Frankliniella occidentals Official Gene Set v1.1, transcripts"],
                ["Protein", "Peptide", "fraocc_OGSv1.1_pep.fa", "Frankliniella occidentalis", "Frankliniella occidentals Official Gene Set v1.1, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_003640425.2_ASM364042v2_genomic.fna", "Galleria mellonella", "Galleria mellonella genome assembly GCF_003640425.2"],
                ["Transcript", "Nucleotide", "GCF_003640425.2_ASM364042v2_cds_from_genomic-idupdate.fa", "Galleria mellonella", "Galleria mellonella NCBI Annotation Release 101, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_003640425.2_ASM364042v2_rna_from_genomic-idupdate.fa", "Galleria mellonella", "Galleria mellonella NCBI Annotation Release 101, RNA from genomic"],
                ["Protein", "Peptide", "GCF_003640425.2_ASM364042v2_translated_cds-idupdate.fa", "Galleria mellonella", "Galleria mellonella NCBI Annotation Release 101, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Gbue.scaffolds.50_new_ids.fa", "Gerris buenoi", "Gbue.scaffolds.50_new_ids.fa"],
                ["Transcript", "Nucleotide", "GBUE_new_ids.fna", "Gerris buenoi", "GBUE_new_ids.fna"],
                ["Transcript", "Nucleotide", "gerbue_OGSv1.1_cds.fa", "Gerris buenoi", "Gerris buenoi OGSv1.1, CDS"],
                ["Transcript", "Nucleotide", "gerbue_OGSv1.1_trans.fa", "Gerris buenoi", "Gerris buenoi OGSv1.1, RNA"],
                ["Protein", "Peptide", "GBUE_new_ids.faa", "Gerris buenoi", "GBUE_new_ids.faa"],
                ["Protein", "Peptide", "gerbue_OGSv1.1_pep.fa", "Gerris buenoi", "Gerris buenoi OGSv1.1, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_001263275.1_ASM126327v1_genomic_GenBankIds.fna", "Habropoda laboriosa", "Habropoda laboriosa genome assembly Hlab1.0 (ASM126327v1), genomic scaffolds"],
                ["Protein", "Peptide", "GCA_001263275.1_ASM126327v1_protein.faa", "Habropoda laboriosa", "Habropoda laboriosa - ASM126327v1 GenBank Annotations, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_000696795.3_Hhal_1.1_genomic.fna", "Halyomorpha halys", "Halyomorpha halys genome assembly GCA_000696795.3"],
                ["Transcript", "Nucleotide", "halhal_OGSv1.2_cds.fa", "Halyomorpha halys", "Halyomorpha halys Official Gene Set v1.2, CDS"],
                ["Transcript", "Nucleotide", "halhal_OGSv1.2_trans.fa", "Halyomorpha halys", "Halyomorpha halys Official Gene Set v1.2, transcripts"],
                ["Protein", "Peptide", "halhal_OGSv1.2_pep.fa", "Halyomorpha halys", "Halyomorpha halys Official Gene Set v1.2, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_022581195.2_ilHelZeax1.1_genomic.fna", "Helicoverpa zea", "Helicoverpa zea genome assembly, ilHelZeax1.1"],
                ["Transcript", "Nucleotide", "GCF_022581195.2_ilHelZeax1.1_cds_from_genomic.fna", "Helicoverpa zea", "Helicoverpa zea NCBI Annotation Release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_022581195.2_ilHelZeax1.1_rna_from_genomic.fna", "Helicoverpa zea", "Helicoverpa zea NCBI Annotation Release 100, transcripts"],
                ["Protein", "Peptide", "GCF_022581195.2_ilHelZeax1.1_translated_cds.faa", "Helicoverpa zea", "Helicoverpa zea NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCA_002382865.1_K63_refined_pacbio_genomic.fna", "Heliothis virescens", "Heliothis virescens genome assembly GCA_002382865.1"],
                ["Transcript", "Nucleotide", "GCA_002382865.1_K63_refined_pacbio_cds_from_genomic.fna", "Heliothis virescens", "Heliothis virescens H_virescens_OGS1, CDS"],
                ["Transcript", "Nucleotide", "GCA_002382865.1_K63_refined_pacbio_rna_from_genomic.fna", "Heliothis virescens", "Heliothis virescens H_virescens_OGS1, RNA"],
                ["Protein", "Peptide", "GCA_002382865.1_K63_refined_pacbio_protein.fasta", "Heliothis virescens", "Heliothis virescens H_virescens_OGS1, proteins"],
                ["Protein", "Peptide", "GCA_002382865.1_K63_refined_pacbio_translated_cds.fasta", "Heliothis virescens", "Heliothis virescens H_virescens_OGS1, translation from CDS"],
                ["Genome Assembly", "Nucleotide", "GCA_002738285.1_ASM273828v1_genomic.fna", "Holacanthella duospinosa", "Holacanthella duospinosa genome assembly GCA_002738285.1"],
                ["Transcript", "Nucleotide", "Holacanthella_duospinosa_annotation_1.0_cds.fa", "Holacanthella duospinosa", "Holacanthella duospinosa annotations Holacanthella_duospinosa_annotation v1.0, CDS"],
                ["Transcript", "Nucleotide", "Holacanthella_duospinosa_annotation_1.0_trans.fa", "Holacanthella duospinosa", "Holacanthella duospinosa annotations Holacanthella_duospinosa_annotation v1.0, transcripts"],
                ["Protein", "Peptide", "Holacanthella_duospinosa_annotation_1.0_pep.fa", "Holacanthella duospinosa", "Holacanthella duospinosa annotations Holacanthella_duospinosa_annotation v1.0, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_000696855.1_Hvit_1.0_genomic.fna", "Homalodisca vitripennis", "Homalodisca vitripennis genome assembly GCA_000696855.1"],
                ["Transcript", "Nucleotide", "HVIT_new_ids.fna", "Homalodisca vitripennis", "HVIT_new_ids.fna"],
                ["Protein", "Peptide", "HVIT_new_ids.faa", "Homalodisca vitripennis", "HVIT_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCA_000764305.3_Hazt_2.0.1_genomic.fna", "Hyalella azteca", "Hyalella azteca genome assembly GCA_000764305.3"],
                ["Transcript", "Nucleotide", "hyaazt_OGSv1.2_cds.fa", "Hyalella azteca", "Hyalella azteca OGSv1.2, CDS"],
                ["Transcript", "Nucleotide", "hyaazt_OGSv1.2_trans.fa", "Hyalella azteca", "Hyalella azteca OGSv1.2, transcripts"],
                ["Protein", "Peptide", "hyaazt_OGSv1.2_pep.fa", "Hyalella azteca", "Hyalella azteca OGSv1.2, peptides"],
                ["Genome Assembly", "Nucleotide", "GCA_000376725.2_Lful_2.0_genomic.fna", "Ladona fulva", "Ladona fulva genome assembly, Lful_2.0"],
                ["Transcript", "Nucleotide", "ladful_OGSv1.0_cds.fa", "Ladona fulva", "Ladona fulva Official Gene Set ladful OGSv1.0, CDS"],
                ["Transcript", "Nucleotide", "ladful_OGSv1.0_trans.fa", "Ladona fulva", "Ladona fulva Official Gene Set ladful OGSv1.0, transcripts"],
                ["Protein", "Peptide", "ladful_OGSv1.0_pep.fa", "Ladona fulva", "Ladona fulva Official Gene Set ladful OGSv1.0, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCA_003335185.2_ASM333518v2_genomic.fna", "Laodelphax striatellus", "Laodelphax striatellus genome assembly GCA_003335185.2"],
                ["Transcript", "Nucleotide", "laostr_OGSv1.2_cds.fna", "Laodelphax striatellus", "Laodelphax striatellus laostr_OGSv1.2, CDS"],
                ["Transcript", "Nucleotide", "laostr_OGSv1.2_trans.fna", "Laodelphax striatellus", "Laodelphax striatellus laostr_OGSv1.2, RNA"],
                ["Protein", "Peptide", "laostr_OGSv1.2_pep.faa", "Laodelphax striatellus", "Laodelphax striatellus laostr_OGSv1.2, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_000346575.1_ASM34657v1_genomic_GenBankIDs.fna", "Lasioglossum albipes", "Lasioglossum albipes genome assembly ASM34657v1"],
                ["Transcript", "Nucleotide", "Lalb_OGS_v5.42.cds.fa", "Lasioglossum albipes", "Lasioglossum albipes coding sequence (CDS), Lalb_OGS_v5.42"],
                ["Protein", "Peptide", "Lalb_OGS_v5.42.pep.fa", "Lasioglossum albipes", "Lasioglossum albipes proteins, Lalb_OGS_v5.42"],
                ["Genome Assembly", "Nucleotide", "GCA_000697925.1_Lhes_1.0_genomic.fna", "Latrodectus hesperus", "Latrodectus hesperus genome assembly GCA_000697925.1"],
                ["Transcript", "Nucleotide", "LHES_new_ids.fna", "Latrodectus hesperus", "LHES_new_ids.fna"],
                ["Protein", "Peptide", "LHES_new_ids.faa", "Latrodectus hesperus", "LHES_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCF_000500325.1_Ldec_2.0_genomic.fna", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata genome assembly GCF_000500325.1"],
                ["Genome Assembly", "Nucleotide", "Ldec.genome.10062013_new_ids.fa", "Leptinotarsa decemlineata", "Deprecated Genome Assembly Ldec.genome.10062013_new_ids.fa (No Apollo access)"],
                ["Transcript", "Nucleotide", "GCF_000500325.1_Ldec_2.0_rna.fna", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata NCBI annotation release 100, rna"],
                ["Transcript", "Nucleotide", "GCF_000500325.1_Ldec_2.0_rna_from_genomic.fna", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata NCBI annotation release 100, rna from genomic"],
                ["Transcript", "Nucleotide", "LDEC_new_ids.fna", "Leptinotarsa decemlineata", "LDEC_new_ids.fna"],
                ["Transcript", "Nucleotide", "lepdec_OGSv1.2_GCF_000500325.1_cds.fa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata OGSv1.2, CDS"],
                ["Transcript", "Nucleotide", "lepdec_OGSv1.2_GCF_000500325.1_trans.fa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata OGSv1.2, transcripts"],
                ["Protein", "Peptide", "GCF_000500325.1_Ldec_2.0_protein.faa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata NCBI annotation release 100, proteins"],
                ["Protein", "Peptide", "GCF_000500325.1_Ldec_2.0_translated_cds.faa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata NCBI annotation release 100, translated cds"],
                ["Protein", "Peptide", "LDEC_new_ids.faa", "Leptinotarsa decemlineata", "LDEC_new_ids.faa"],
                ["Protein", "Peptide", "lepdec_OGSv1.2_GCF_000500325.1_pep.fa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata OGSv1.2, proteins"],
                ["Genome Assembly", "Nucleotide", "Llun.scaffolds_new_ids.fa", "Limnephilus lunatus", "Llun.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "LLUN_new_ids.fna", "Limnephilus lunatus", "LLUN_new_ids.fna"],
                ["Protein", "Peptide", "LLUN_new_ids.faa", "Limnephilus lunatus", "LLUN_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "Lm_assembly2-2.fasta", "Locusta migratoria", "Locusta migratoria v2.2 - all sequences, no genome browser connection"],
                ["Genome Assembly", "Nucleotide", "Lm_assembly2-2_over499.fasta", "Locusta migratoria", "Locusta migratoria v2.2 - sequences larger than 500 bp, with genome browser connection"],
                ["Transcript", "Nucleotide", "locust.OGS_preQC.gff3.cds", "Locusta migratoria", "Locusta migratoria JAMg OGS v1, CDS"],
                ["Transcript", "Nucleotide", "locust.OGS_preQC.gff3.mRNA", "Locusta migratoria", "Locusta migratoria JAMg OGS v1, mRNA"],
                ["Protein", "Peptide", "locust.OGS_preQC.gff3.pep", "Locusta migratoria", "Locusta migratoria JAMg OGS v1, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_001188405.1_Lrec_1.0_genomic.fna", "Loxosceles reclusa", "Loxosceles reclusa genome assembly GCA_001188405.1"],
                ["Transcript", "Nucleotide", "LREC_new_ids.fna", "Loxosceles reclusa", "LREC_new_ids.fna"],
                ["Protein", "Peptide", "LREC_new_ids.faa", "Loxosceles reclusa", "LREC_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCF_015586225.1_ASM1558622v1_genomic.fna", "Lucilia sericata", "Lucilia sericata genome assembly, ASM1558622v1"],
                ["Transcript", "Nucleotide", "GCF_015586225.1_ASM1558622v1_cds_from_genomic-idupdate.fna", "Lucilia sericata", "Lucilia sericata NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_015586225.1_ASM1558622v1_rna_from_genomic-idupdate.fna", "Lucilia sericata", "Lucilia sericata NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_015586225.1_ASM1558622v1_translated_cds-idupdate.faa", "Lucilia sericata", "Lucilia sericata NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCA_002192655.1_ASM219265v1_genomic.fna", "Mamestra configurata", "Mamestra configurata genome assembly GCA_002192655.1 (ASM219265v1)"],
                ["Genome Assembly", "Nucleotide", "GCF_014839805.1_JHU_Msex_v1.0_genomic.fna", "Manduca sexta", "Manduca sexta genome assembly, JHU_Msex_v1.0"],
                ["Transcript", "Nucleotide", "GCF_014839805.1_JHU_Msex_v1.0_cds_from_genomic-idupdate.fna", "Manduca sexta", "Manduca sexta NCBI Annotation release 102, CDS"],
                ["Transcript", "Nucleotide", "GCF_014839805.1_JHU_Msex_v1.0_rna_from_genomic-idupdate.fna", "Manduca sexta", "Manduca sexta NCBI Annotation release 102, transcripts"],
                ["Transcript", "Nucleotide", "Manduca_sexta_OGS_v2.0_transcript", "Manduca sexta", "Manduca_sexta_OGS_v2.0_transcript"],
                ["Protein", "Peptide", "GCF_014839805.1_JHU_Msex_v1.0_translated_cds-idupdate.faa", "Manduca sexta", "Manduca sexta NCBI Annotation release 102, translated CDS"],
                ["Protein", "Peptide", "Manduca_sexta_OGS_v2.0_peptide", "Manduca sexta", "Manduca_sexta_OGS_v2.0_peptide"],
                ["Genome Assembly", "Nucleotide", "hf_scaffolds_blast_ids.fa", "Mayetiola destructor", "Mayetiola_destructor_scaffolds"],
                ["Transcript", "Nucleotide", "Mayetiola_destructor_OGS_v1.0_transcripts", "Mayetiola destructor", "Mayetiola destructor OGS_v1.0, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "hf_OGS1.0.cdna.fasta", "Mayetiola destructor", "Mayetiola destructor OGS_v1.0, cDNA"],
                ["Protein", "Peptide", "Mayetiola_destructor_OGS_v1.0_proteins", "Mayetiola destructor", "Mayetiola destructor OGS_v1.0, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_003012365.1_ASM301236v1_genomic.fna", "Medauroidea extradentata", "Medauroidea extradentata genome assembly GCA_003012365.1"],
                ["Transcript", "Nucleotide", "Mext_OGS_v1.0_transcripts.fa", "Medauroidea extradentata", "Medauroidea extradentata annotations OGS v1.0, transcripts"],
                ["Protein", "Peptide", "Mext_OGS_v1.0_pep.fa", "Medauroidea extradentata", "Medauroidea extradentata annotations OGS v1.0, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_000220905.1_MROT_1.0_genomic_RefSeqIDs.fna", "Megachile rotundata", "Megachile rotundata genome assembly MROT1.0 (GCF_000220905.1)"],
                ["Transcript", "Nucleotide", "Megachile_rotundata_v1.1.cds.fa", "Megachile rotundata", "Megachile rotundata v1.1, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "NCBI_Megachile_rotundata_Annotation_Release_101_rna.fa", "Megachile rotundata", "Megachile rotundata NCBI annotation release 101, RNA"],
                ["Protein", "Peptide", "Megachile_rotundata_v1.1.pep.fa", "Megachile rotundata", "Megachile rotundata v1.1, proteins"],
                ["Protein", "Peptide", "NCBI_Megachile_rotundata_Annotation_Release_101_protein.fa", "Megachile rotundata", "Megachile rotundata NCBI annotation release 101, proteins"],
                ["Genome Assembly", "Nucleotide", "GCA_001276565.1_ASM127656v1_genomic_GenBankIDs.fna", "Melipona quadrifasciata", "Melipona quadrifasciata genome assembly ASM127656v1, genomic scaffolds"],
                ["Transcript", "Nucleotide", "Melipona_quadrifasciata_v1.1.cds.fa", "Melipona quadrifasciata", "Melipona quadrifasciata v1.1. coding sequence (CDS)"],
                ["Protein", "Peptide", "GCA_001276565.1_ASM127656v1_protein.faa", "Melipona quadrifasciata", "Melipona quadrifasciata GLEAN predicted proteins"],
                ["Protein", "Peptide", "Melipona_quadrifasciata_v1.1.pep.fa", "Melipona quadrifasciata", "Melipona quadrifasciata v1.1. proteins"],
                ["Genome Assembly", "Nucleotide", "69319_ref_Mdem2_chrUn_refseq_IDS.fa", "Microplitis demolitor", "Microplitis demolitor genome assembly GCA_000572035.2, genomic scaffolds"],
                ["Transcript", "Nucleotide", "micdem_OGSv1.0_cds.fa", "Microplitis demolitor", "Microplitis demolitor Official Gene Set micdem_OGSv1.0, CDS"],
                ["Transcript", "Nucleotide", "micdem_OGSv1.0_trans.fa", "Microplitis demolitor", "Microplitis demolitor Official Gene Set micdem_OGSv1.0, transcripts"],
                ["Transcript", "Nucleotide", "ref_Mdem2_rna.fa", "Microplitis demolitor", "Microplitis demolitor - NCBI Annotation Release 101, RNA"],
                ["Protein", "Peptide", "micdem_OGSv1.0_pep.fa", "Microplitis demolitor", "Microplitis demolitor Official Gene Set micdem_OGSv1.0, proteins"],
                ["Protein", "Peptide", "ref_Mdem2_protein.fa", "Microplitis demolitor", "Microplitis demolitor - NCBI Annotation Release 101, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_021155785.1_iyNeoFabr1.1_genomic.fna", "Neodiprion fabricii", "Neodiprion fabricii genome assembly, iyNeoFabr1.1"],
                ["Transcript", "Nucleotide", "GCF_021155785.1_iyNeoFabr1.1_cds_from_genomic.fna", "Neodiprion fabricii", "Neodiprion fabricii NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_021155785.1_iyNeoFabr1.1_rna_from_genomic.fna", "Neodiprion fabricii", "Neodiprion fabricii NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021155785.1_iyNeoFabr1.1_translated_cds.faa", "Neodiprion fabricii", "Neodiprion fabricii NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_021901455.1_iyNeoLeco1.1_genomic.fna", "Neodiprion lecontei", "Neodiprion lecontei genome assembly, iyNeoLeco1.1"],
                ["Transcript", "Nucleotide", "GCF_021901455.1_iyNeoLeco1.1_cds_from_genomic.fna", "Neodiprion lecontei", "Neodiprion lecontei NCBI Annotation release 101, CDS"],
                ["Transcript", "Nucleotide", "GCF_021901455.1_iyNeoLeco1.1_rna_from_genomic.fna", "Neodiprion lecontei", "Neodiprion lecontei NCBI Annotation release 101, transcripts"],
                ["Protein", "Peptide", "GCF_021901455.1_iyNeoLeco1.1_translated_cds.faa", "Neodiprion lecontei", "Neodiprion lecontei NCBI Annotation release 101, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_021155775.1_iyNeoPine1.1_genomic.fna", "Neodiprion pinetum", "Neodiprion pinetum genome assembly, iyNeoPine1.1"],
                ["Transcript", "Nucleotide", "GCF_021155775.1_iyNeoPine1.1_cds_from_genomic.fna", "Neodiprion pinetum", "Neodiprion pinetum NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_021155775.1_iyNeoPine1.1_rna_from_genomic.fna", "Neodiprion pinetum", "Neodiprion pinetum NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021155775.1_iyNeoPine1.1_translated_cds.faa", "Neodiprion pinetum", "Neodiprion pinetum NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_021901495.1_iyNeoVirg1.1_genomic.fna", "Neodiprion virginiana", "Neodiprion virginiana genome assembly, iyNeoVirg1.1"],
                ["Transcript", "Nucleotide", "GCF_021901495.1_iyNeoVirg1.1_cds_from_genomic.fna", "Neodiprion virginiana", "Neodiprion virginiana NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_021901495.1_iyNeoVirg1.1_rna_from_genomic.fna", "Neodiprion virginiana", "Neodiprion virginiana NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021901495.1_iyNeoVirg1.1_translated_cds.faa", "Neodiprion virginiana", "Neodiprion virginiana NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_001412225.1_Nicves_v1.0_genomic_RefSeqIDs.fna", "Nicrophorus vespilloides", "Nicrophorus vespilloides genome assembly Nicve_v1.0 (GCF_001412225.1)"],
                ["Transcript", "Nucleotide", "GCF_001412225.1_Nicve_v1.0_cds_from_genomic.fna", "Nicrophorus vespilloides", "Nicrophorus vespilloides Annotation Release 100 (GCF_001412225.1), CDS predicted from genomic sequence"],
                ["Transcript", "Nucleotide", "GCF_001412225.1_Nicve_v1.0_rna_from_genomic.fna", "Nicrophorus vespilloides", "Nicrophorus vespilloides Annotation Release 100 (GCF_001412225.1), RNA predicted from genomic sequence"],
                ["Transcript", "Nucleotide", "nicves_OGSv1.0_cds.fa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Official Gene Set v1.0 CDS (Cunningham et al. 2015 Genome Biology and Evolution)"],
                ["Transcript", "Nucleotide", "nicves_OGSv1.0_trans.fa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Official Gene Set v1.0 cDNA (Cunningham et al. 2015 Genome Biology and Evolution)"],
                ["Protein", "Peptide", "GCF_001412225.1_Nicve_v1.0_protein.faa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Annotation Release 100 (GCF_001412225.1), proteins"],
                ["Protein", "Peptide", "nicves_OGSv1.0_pep.fa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Official Gene Set v1.0 proteins (Cunningham et al. 2015 Genome Biology and Evolution)"],
                ["Genome Assembly", "Nucleotide", "GCF_005281655.1_TAMU_Nfulva_1.0_genomic.fna", "Nylanderia fulva", "Nylanderia fulva genome assembly GCF_005281655.1"],
                ["Transcript", "Nucleotide", "nylful_OGSv1.0_CDS.fa", "Nylanderia fulva", "Nylanderia fulva Official Gene Set nyful_OGSv1.0, CDS"],
                ["Transcript", "Nucleotide", "nylful_OGSv1.0_trans.fa", "Nylanderia fulva", "Nylanderia fulva Official Gene Set nyful_OGSv1.0, transcripts"],
                ["Protein", "Peptide", "nylful_OGSv1.0_pep.fa", "Nylanderia fulva", "Nylanderia fulva Official Gene Set nyful_OGSv1.0, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_010583005.1_Obru_v1_genomic.fna", "Odontomachus brunneus", "Odontomachus brunneus genome assembly GCF_010583005.1"],
                ["Transcript", "Nucleotide", "GCF_010583005.1_Obru_v1_cds_from_genomic-idupdate.fna", "Odontomachus brunneus", "Odontomachus brunneus NCBI Annotation Release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_010583005.1_Obru_v1_rna_from_genomic-idupdate.fna", "Odontomachus brunneus", "Odontomachus brunneus NCBI Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_010583005.1_Obru_v1_translated_cds-idupdate.faa", "Odontomachus brunneus", "Odontomachus brunneus NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Ofas.scaffolds_new_ids.fa", "Oncopeltus fasciatus", "Ofas.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "oncfas_OGSv1.2_original_cds.fa", "Oncopeltus fasciatus", "Oncopeltus fasciatus OGSv1.2, CDS"],
                ["Transcript", "Nucleotide", "oncfas_OGSv1.2_original_transcript.fa", "Oncopeltus fasciatus", "Oncopeltus fasciatus OGSv1.2 transcripts"],
                ["Protein", "Peptide", "oncfas_OGSv1.2_original_peptide.fa", "Oncopeltus fasciatus", "Oncopeltus fasciatus OGSv1.2, peptides"],
                ["Genome Assembly", "Nucleotide", "Otaur.scaffolds_new_ids.fa", "Onthophagus taurus", "Otaur.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "OTAU_new_ids.fna", "Onthophagus taurus", "OTAU_new_ids.fna"],
                ["Protein", "Peptide", "OTAU_new_ids.faa", "Onthophagus taurus", "OTAU_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "Oabi11242013.genome_new_ids.fa", "Orussus abietinus", "Oabi11242013.genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "oruabi_OGSv1.2_cds.fa", "Orussus abietinus", "Orussus abietinus OGSv1.2, coding sequence (CDS)"],
                ["Transcript", "Nucleotide", "oruabi_OGSv1.2_trans.fa", "Orussus abietinus", "Orussus abietinus OGSv1.2, transcripts"],
                ["Protein", "Peptide", "oruabi_OGSv1.2_pep.fa", "Orussus abietinus", "Orussus abietinus OGSv1.2, peptides"],
                ["Genome Assembly", "Nucleotide", "GCF_012274295.1_USDA_OLig_1.0_genomic.fna", "Osmia lignaria", "Osmia lignaria genome assembly GCF_012274295.1"],
                ["Transcript", "Nucleotide", "GCF_012274295.1_USDA_OLig_1.0_cds_from_genomic-idupdate.fna", "Osmia lignaria", "Osmia lignaria NCBI Annotation Release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_012274295.1_USDA_OLig_1.0_rna_from_genomic-idupdate.fna", "Osmia lignaria", "Osmia lignaria NCBI Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_012274295.1_USDA_OLig_1.0_translated_cds-idupdate.faa", "Osmia lignaria", "Osmia lignaria NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Pven10162013.scaffolds_new_ids.fa", "Pachypsylla venusta", "Pven10162013.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "PVEN_new_ids.fna", "Pachypsylla venusta", "PVEN_new_ids.fna"],
                ["Protein", "Peptide", "PVEN_new_ids.faa", "Pachypsylla venusta", "PVEN_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "Ptep01282013.genome_new_ids.fa", "Parasteatoda tepidariorum", "Ptep01282013.genome_new_ids.fa"],
                ["Transcript", "Nucleotide", "Augustus_set_v3.0_transcripts", "Parasteatoda tepidariorum", "Augustus_set_v3.0_transcripts"],
                ["Transcript", "Nucleotide", "PTEP_new_ids.fna", "Parasteatoda tepidariorum", "PTEP_new_ids.fna"],
                ["Protein", "Peptide", "Augustus_set_v3.0_proteins", "Parasteatoda tepidariorum", "Augustus_set_v3.0_proteins"],
                ["Protein", "Peptide", "PTEP_new_ids.faa", "Parasteatoda tepidariorum", "PTEP_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCF_008802855.1_Ppyr1.3_genomic.fna", "Photinus pyralis", "Photinus pyralis genome assembly, Ppyr1.3"],
                ["Transcript", "Nucleotide", "GCF_008802855.1_Ppyr1.3_cds_from_genomic-idupdate.fna", "Photinus pyralis", "Photinus pyralis NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_008802855.1_Ppyr1.3_rna_from_genomic-idupdate.fna", "Photinus pyralis", "Photinus pyralis NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_008802855.1_Ppyr1.3_translated_cds-idupdate.faa", "Photinus pyralis", "Photinus pyralis NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_001687245.1_Rhagoletis_zephyria_1.0_genomic_RefSeqIDs.fna", "Rhagoletis zephyria", "Rhagoletis zephyria genome assembly Rhagoletis_zephyria_1.0 (GCF_001687245.1)"],
                ["Transcript", "Nucleotide", "GCF_001687245.1_Rhagoletis_zephyria_1.0_cds_from_genomic.fna", "Rhagoletis zephyria", "Rhagoletis zephyria Annotation Release 100 (GCF_001687245.1), CDS predicted from genomic sequence"],
                ["Transcript", "Nucleotide", "GCF_001687245.1_Rhagoletis_zephyria_1.0_rna_from_genomic.fna", "Rhagoletis zephyria", "Rhagoletis zephyria Annotation Release 100 (GCF_001687245.1), RNA predicted from genomic sequence"],
                ["Protein", "Peptide", "GCF_001687245.1_Rhagoletis_zephyria_1.0_protein.faa", "Rhagoletis zephyria", "Rhagoletis zephyria Annotation Release 100 (GCF_001687245.1), proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_013339725.1_ASM1333972v1_genomic.fna", "Rhipicephalus microplus", "Rhipicephalus microplus genome assembly, ASM1333972v1"],
                ["Transcript", "Nucleotide", "GCF_013339725.1_ASM1333972v1_cds_from_genomic.fna", "Rhipicephalus microplus", "Rhipicephalus microplus NCBI Annotation Release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_013339725.1_ASM1333972v1_rna_from_genomic.fna", "Rhipicephalus microplus", "Rhipicephalus microplus NCBI Annotation Release 100, transcripts"],
                ["Protein", "Peptide", "GCF_013339725.1_ASM1333972v1_translated_cds.faa", "Rhipicephalus microplus", "Rhipicephalus microplus NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "_____RdoDt3_Drdd8_decomES.fasta", "Rhyzopertha dominica", "Rhyzopertha dominica genome assembly RdoDt3_Drdd8_decomES"],
                ["Transcript", "Nucleotide", "GCF_021461395.2_iqSchAmer2.1_cds_from_genomic.fna", "Schistocerca americana", "Schistocerca americana NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_021461395.2_iqSchAmer2.1_rna_from_genomic.fna", "Schistocerca americana", "Schistocerca americana NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021461395.2_iqSchAmer2.1_translated_cds.faa", "Schistocerca americana", "Schistocerca americana NCBI Annotation release 100, translated CDS"],
                ["Transcript", "Nucleotide", "GCF_023897955.1_iqSchGreg1.2_cds_from_genomic.fna", "Schistocerca gregaria", "Schistocerca gregaria NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_023897955.1_iqSchGreg1.2_rna.fna", "Schistocerca gregaria", "Schistocerca gregaria NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_023897955.1_iqSchGreg1.2_protein.faa", "Schistocerca gregaria", "Schistocerca gregaria NCBI Annotation release 100, translated CDS"],
                ["Transcript", "Nucleotide", "GCF_023898315.1_iqSchNite1.1_cds_from_genomic.fna", "Schistocerca nitens", "Schistocerca nitens NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_023898315.1_iqSchNite1.1_rna.fna", "Schistocerca nitens", "Schistocerca nitens NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_023898315.1_iqSchNite1.1_protein.faa", "Schistocerca nitens", "Schistocerca nitens NCBI Annotation release 100, translated CDS"],
                ["Transcript", "Nucleotide", "GCF_021461385.2_iqSchPice1.1_cds_from_genomic.fna", "Schistocerca piceifrons", "Schistocerca piceifrons NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_021461385.2_iqSchPice1.1_rna_from_genomic.fna", "Schistocerca piceifrons", "Schistocerca piceifrons NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_021461385.2_iqSchPice1.1_translated_cds.faa", "Schistocerca piceifrons", "Schistocerca piceifrons NCBI Annotation release 100, translated CDS"],
                ["Transcript", "Nucleotide", "GCF_023864345.2_iqSchSeri2.2_cds_from_genomic.fna", "Schistocerca serialis", "Schistocerca serialis cubense NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_023864345.2_iqSchSeri2.2_rna.fna", "Schistocerca serialis", "Schistocerca serialis cubense NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_023864345.2_iqSchSeri2.2_protein.faa", "Schistocerca serialis", "Schistocerca serialis cubense NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "TCALIF_genome_v1.0_new_ids.fasta", "Tigriopus californicus", "TCALIF_genome_v1.0_new_ids.fasta"],
                ["Transcript", "Nucleotide", "TCALIF_transcripts_v1.0_new_ids.fasta", "Tigriopus californicus", "TCALIF_transcripts_v1.0_new_ids.fasta"],
                ["Protein", "Peptide", "TCALIF_proteins_v1.0_new_ids.fasta", "Tigriopus californicus", "TCALIF_proteins_v1.0_new_ids.fasta"],
                ["Genome Assembly", "Nucleotide", "GCF_000002335.3_Tcas5.2_genomic_RefSeqIDs.fna", "Tribolium castaneum", "Tribolium castaneum genome assembly Tcas5.2 (GCF_000002335.3), genomic scaffolds"],
                ["Transcript", "Nucleotide", "GCF_000002335.3_Tcas5.2_rna.fna", "Tribolium castaneum", "Tribolium castaneum NCBI Annotation Release 103, RNA"],
                ["Protein", "Peptide", "GCA_000002335.3_Tcas5.2_protein.faa", "Tribolium castaneum", "Tribolium castaneum OGSv3, proteins"],
                ["Protein", "Peptide", "GCF_000002335.3_Tcas5.2_protein.faa", "Tribolium castaneum", "Tribolium castaneum NCBI Annotation Release 103, proteins"],
                ["Genome Assembly", "Nucleotide", "GCF_015345945.1_Tmad_KSU_1.1_genomic.fna", "Tribolium madens", "Tribolium madens genome assembly, Tmad_KSU_1.1"],
                ["Transcript", "Nucleotide", "GCF_015345945.1_Tmad_KSU_1.1_cds_from_genomic.fna", "Tribolium madens", "Tribolium madens NCBI Annotation release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_015345945.1_Tmad_KSU_1.1_rna_from_genomic.fna", "Tribolium madens", "Tribolium madens NCBI Annotation release 100, transcripts"],
                ["Protein", "Peptide", "GCF_015345945.1_Tmad_KSU_1.1_translated_cds.faa", "Tribolium madens", "Tribolium madens NCBI Annotation release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "Tpre_FINAL.scaffolds_new_ids.fa", "Trichogramma pretiosum", "Tpre_FINAL.scaffolds_new_ids.fa"],
                ["Transcript", "Nucleotide", "TPRE_new_ids.fna", "Trichogramma pretiosum", "TPRE_new_ids.fna"],
                ["Protein", "Peptide", "TPRE_new_ids.faa", "Trichogramma pretiosum", "TPRE_new_ids.faa"],
                ["Genome Assembly", "Nucleotide", "GCF_002443255.1_Vdes_3.0_genomic.fna", "Varroa destructor", "Varroa destructor genome assembly GCF_002443255.1"],
                ["Transcript", "Nucleotide", "GCF_002443255.1_Vdes_3.0_cds_from_genomic.fna", "Varroa destructor", "Varroa destructor NCBI Varroa destructor Annotation Release 100, cds from genomic"],
                ["Transcript", "Nucleotide", "GCF_002443255.1_Vdes_3.0_rna_from_genomic.fna", "Varroa destructor", "Varroa destructor NCBI Varroa destructor Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_002443255.1_Vdes_3.0_translated_cds.faa", "Varroa destructor", "Varroa destructor NCBI Varroa destructor Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_002532875.1_vjacob_1.0_genomic.fna", "Varroa jacobsoni", "Varroa jacobsoni genome assembly GCF_002532875.1"],
                ["Transcript", "Nucleotide", "GCF_002532875.1_vjacob_1.0_cds_from_genomic.fna", "Varroa jacobsoni", "Varroa jacobsoni NCBI Annotation Release 100, CDS from genomic"],
                ["Transcript", "Nucleotide", "GCF_002532875.1_vjacob_1.0_rna_from_genomic.fna", "Varroa jacobsoni", "Varroa jacobsoni NCBI Annotation Release 100, RNA from genomic"],
                ["Protein", "Peptide", "GCF_002532875.1_vjacob_1.0_translated_cds.faa", "Varroa jacobsoni", "Varroa jacobsoni NCBI Annotation Release 100, translated CDS"],
                ["Genome Assembly", "Nucleotide", "GCF_019457755.1_ASM1945775v1_genomic.fna", "Venturia canescens", "Venturia canescens genome assembly, ASM1945775v1"],
                ["Transcript", "Nucleotide", "GCF_019457755.1_ASM1945775v1_cds_from_genomic.fna", "Venturia canescens", "Venturia canescens NCBI Annotation Release 100, CDS"],
                ["Transcript", "Nucleotide", "GCF_019457755.1_ASM1945775v1_rna_from_genomic.fna", "Venturia canescens", "Venturia canescens NCBI Annotation Release 100, transcripts"],
                ["Protein", "Peptide", "GCF_019457755.1_ASM1945775v1_translated_cds.faa", "Venturia canescens", "Venturia canescens NCBI Annotation Release 100, translated CDS"]
            ];
        }else if($endpoint === "hmmer_stub") {
             $api_data = [
                ["Protein", "Protein", "GCF_001937115.1_Atum_1.0_protein.faa", "Aethina tumida MOCKED_DATA", "Aethina tumida Annotation Release 100 (GCF_001937115.1), proteins"],
                ["Protein", "Protein", "APLA_new_ids.faa", "Agrilus planipennis", "Agrilus planipennis Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_000699045.1_Apla_1.0_protein.faa", "Agrilus planipennis", "Agrilus planipennis NCBI annotation release 100, proteins"],
                ["Protein", "Protein", "ref_ASM118610v1_protein.fa", "Amyelois transitella", "Amyelois transitella - NCBI annotation release 100, proteins"],
                ["Protein", "Protein", "GCF_000390285.2_Agla_2.0_translated_cds.faa", "Anoplophora glabripennis", "NCBI Anoplophora glabripennis Annotation Release 101, translated CDS"],
                ["Protein", "Protein", "agla_OGS_v1_2_peptide.fa", "Anoplophora glabripennis", "Anoplophora glabripennis peptides, OGSv1.2"],
                ["Protein", "Protein", "anogla_OGSv1.3_pep.fa", "Anoplophora glabripennis", "Anoplophora glabripennis OGSv1.3, peptides"],
                ["Protein", "Protein", "/app/data/other_species/antgra/icAntGran1.3/scaffold/analyses/NCBI Anthonomus grandis grandis Annotation Release 100/GCF_022605725.1_icAntGran1.3_translated_cds.faa", "Anthonomus grandis", "Anthonomus grandis grandis NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "Apis mellifera OGSv3.3, peptides", "Apis mellifera", "Apis mellifera OGSv3.3, peptides"],
                ["Protein", "Protein", "AROS_new_ids.faa", "Athalia rosae", "Athalia rosae Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_000344095.2_Aros_2.0_translated_cds.faa", "Athalia rosae", "Athalia rosae NCBI annotation release 102, translated cds"],
                ["Protein", "Protein", "baccuc_v100_protein.fa", "Bactrocera cucurbitae", "Bactrocera cucurbitae - NCBI annotation release 100, proteins"],
                ["Protein", "Protein", "BDOR_v1-blast.proteins.fasta", "Bactrocera dorsalis", "Bactrocera dorsalis BDOR_v1 proteins - MAKER analysis"],
                ["Protein", "Protein", "bacdor_v100_protein.fa", "Bactrocera dorsalis", "Bactrocera dorsalis - NCBI annotation release 100, proteins"],
                ["Protein", "Protein", "104688_ref_gapfilled_joined_lt9474.gt500.covgt10_protein.fa", "Bactrocera oleae", "Bactrocera oleae - NCBI annotation release 100, Proteins"],
                ["Protein", "Protein", "Boleae2.gene_structures_post_PASA_updates.116290_RefSeq_ids_updated_prot.faa", "Bactrocera oleae", "Bactrocera oleae JAMg OGS v1, proteins"],
                ["Protein", "Protein", "GCF_001854935.1_ASM185493v1_protein.faa", "Bemisia tabaci", "Bemisia tabaci Annotation Release 100 (GCF_001854935.1), proteins"],
                ["Protein", "Protein", "MEAM1_v1.2-GCF_001854935.1_pep.fa", "Bemisia tabaci", "Bemisia tabaci OGS MEAM1_v1.2, proteins"],
                ["Protein", "Protein", "BGER.faa", "Blattella germanica", "Blattella_germanica_BCM_v0.5.3_proteins"],
                ["Protein", "Protein", "blager_OGSv1.2_pep.fa", "Blattella germanica", "Blattella germanica OGSv1.2, peptides"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_024542735.1_iyBomHunt1.1_translated_cds.faa", "Bombus huntii", "Bombus huntii NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "GCF_000188095.2_BIMP_2.1_translated_cds.faa", "Bombus impatiens", "Bombus impatiens NCBI annotation release 102, peptide"],
                ["Protein", "Protein", "bomimp_OGSv1.1_pep_new.fa", "Bombus impatiens", "Bombus impatiens OGSv1.1, peptide"],
                ["Protein", "Protein", "Bombus_terrestris_v1.4.pep.fa", "Bombus terrestris", "Bombus terrestris gene set v1.4, Peptide"],
                ["Protein", "Protein", "GCF_000214255.1_Bter_1.0_translated_cds.faa", "Bombus terrestris", "Bombus terrestris NCBI annotation release 102, peptide"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/Bradysia_coprophila.Bcop_v1.0_proteins_with_putative_function.fasta", "Bradysia coprophila", "Bradysia_coprophila.Bcop_v1.0, proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_014529535.1_BU_Bcop_v1_translated_cds.faa", "Bradysia coprophila", "Bradysia coprophila NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "CAQU.faa", "Catajapyx aquilonaris", "Catajapyx aquilonaris_BCM_v0.5.3_proteins"],
                ["Protein", "Protein", "CSCU_new_ids.faa", "Centruroides sculpturatus", "Centruroides sculpturatus Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_000341935.1_Ccin1_protein.faa", "Cephus cinctus", "Cephus cinctus Annotation Release 100 (GCF_000341935.1), proteins"],
                ["Protein", "Protein", "GCF_000341935.1_Ccin1_translated_cds_Annotation-Release-101.faa", "Cephus cinctus", "Cephus cinctus Annotation Release 101 (GCF_000341935.1), translated CDS predicted from genomic sequence"],
                ["Protein", "Protein", "cepcin_OGSv1.0_pep.fa", "Cephus cinctus", "Cephus cinctus cepcin_OGSv1.0, proteins"],
                ["Protein", "Protein", "cepcin_OGSv1.1_pep.fa", "Cephus cinctus", "Cephus cinctus cepcin_OGSv1.1, proteins"],
                ["Protein", "Protein", "Cercap_NCBI_RefSeq.faa", "Ceratitis capitata", "NCBI Predicted protein coding genes, Annotation Release 100"],
                ["Protein", "Protein", "cercap_JAMG_v1.pep", "Ceratitis capitata", "Ceratitis capitata JAMG_v1, peptides"],
                ["Protein", "Protein", "GCF_013357705.1_ASM1335770v1_translated_cds-idupdate.faa", "Chelonus insularis", "Chelonus insularis NCBI Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "GCF_000648675.2_Clec_2.1_translated_cds.faa", "Cimex lectularius", "Cimex lectularius NCBI annotation release 101, peptide"],
                ["Protein", "Protein", "clec_OGS_v1_2_peptide.fa", "Cimex lectularius", "Cimex lectularius OGS v1.2, peptides"],
                ["Protein", "Protein", "Clitarchus_hookeri_Maker_annotations_pep.fa", "Clitarchus hookeri", "Clitarchus hookeri Maker annotations, proteins"],
                ["Protein", "Protein", "GCF_009176525.2_AAFC_CNas_1.1_translated_cds-idupdate.faa", "Contarinia nasturtii", "Contarinia nasturtii NCBI Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "CFLO_new_ids.faa", "Copidosoma floridanum", "Copidosoma floridanum Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_003013835.1_Dvir_v2.0_translated_cds.faa", "Diabrotica virgifera", "Diabrotica virgifera Annotation Release 100 (GCF_003013835.1), translated CDS predicted from genomic sequence"],
                ["Protein", "Protein", "GCF_001412515.1_Dall1.0_protein.faa", "Diachasma alloeum", "Diachasma alloeum Annotation Release 100 (GCF_001412515.1), proteins"],
                ["Protein", "Protein", "GCF_001412515.2_Dall2.0_translated_cds-idupdate.faa", "Diachasma alloeum", "Diachasma alloeum NCBI Annotation Release 101, translated CDS"],
                ["Protein", "Protein", "Dcitr_OGSv1.0_pep.fa", "Diaphorina citri", "Diaphorina citri OGSv1.0, proteins"],
                ["Protein", "Protein", "Diacit_refseq_protein.fa", "Diaphorina citri", "Diacit_RefSeq_proteins_Release_100"],
                ["Protein", "Protein", "maker_genes_diaci1.1_proteins_NALmod_new_ids.fasta", "Diaphorina citri", "Diacit_International_psyllid_consortium_proteins_v1"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021155765.1_iyDipSimi1.1_translated_cds.faa", "Diprion similis", "Diprion similis NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "DBIA.faa", "Drosophila biarmipes", "Drosophila biarmipes Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "Eufriesea mexicana NCBI annotation release 100, Peptide", "Drosophila biarmipes", "Eufriesea mexicana NCBI annotation release 100, Peptide"],
                ["Protein", "Protein", "GCF_000233415.1_Dbia_2.0_protein.faa", "Drosophila biarmipes", "Drosophila biarmipes Annotation Release 101 (GCF_000233415.1), proteins"],
                ["Protein", "Protein", "GCF_000612105.2_Oabi_2.0_translated_cds.faa", "Drosophila biarmipes", "Orussus abietinus NCBI annotation release 101, translated cds"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018153845.1_ASM1815384v1_translated_cds.faa", "Drosophila bipectinata", "Drosophila bipectinata NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018152505.1_ASM1815250v1_translated_cds.faa", "Drosophila elegans", "Drosophila elegans NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018153835.1_ASM1815383v1_translated_cds.faa", "Drosophila eugracilis", "Drosophila eugracilis NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018152265.1_ASM1815226v1_translated_cds.faa", "Drosophila ficusphila", "Drosophila ficusphila NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018152535.1_ASM1815253v1_translated_cds.faa", "Drosophila kikkawai", "Drosophila kikkawai NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018152115.1_ASM1815211v1_translated_cds-idupdate.faa", "Drosophila rhopaloa", "Drosophila rhopaloa NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_018152695.1_ASM1815269v1_translated_cds-idupdate.faa", "Drosophila takahashii", "Drosophila takahashii NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "DTAK.faa", "Drosophila takahashii", "Drosophila takahashii Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_000224235.1_Dtak_2.0_protein.faa", "Drosophila takahashii", "Drosophila takahashii Annotation Release 101 (GCF_000224235.1), proteins"],
                ["Protein", "Protein", "Dufourea_novaeangliae_v1.1_mapped-to-RefSeq_peptide.faa", "Dufourea novaeangliae", "Dufourea novaeangliae v1.1, peptide sequences"],
                ["Protein", "Protein", "NCBI_Dufourea_novaeangliae_Annotation_Release_100_protein.fa", "Dufourea novaeangliae", "NCBI Dufourea novaeangliae Annotation Release 100, proteins"],
                ["Protein", "Protein", "ephdan_OGSv1.0_pep.fa", "Ephemera danica", "Ephemera danica ephdan_OGSv1.0, proteins"],
                ["Protein", "Protein", "Eufriesea mexicana OGSv1.2, peptide", "Eufriesea mexicana", "Eufriesea mexicana OGSv1.2, peptide"],
                ["Protein", "Protein", "Edil_v1.0_peptide.fa", "Euglossa dilemma", "Euglossa dilemma v1.0, proteins"],
                ["Protein", "Protein", "EAFF_new_ids.faa", "Eurytemora affinis", "Eurytemora affinis Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "fopari_v100_protein.fa", "Fopius arisanus", "Fopius arisanus - NCBI annotation release 100, proteins"],
                ["Protein", "Protein", "FOCC_new_ids.faa", "Frankliniella occidentalis", "Frankliniella occidentalis Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "fraocc_OGSv1.1_pep.fa", "Frankliniella occidentalis", "Frankliniella occidentalis Official Gene Set v1.1, proteins"],
                ["Protein", "Protein", "GCF_003640425.2_ASM364042v2_translated_cds-idupdate.fa", "Galleria mellonella", "Galleria mellonella NCBI Annotation Release 101, translated CDS"],
                ["Protein", "Protein", "GBUE_new_ids.faa", "Gerris buenoi", "Gerris buenoi Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "gerbue_OGSv1.1_pep.fa", "Gerris buenoi", "Gerris buenoi OGSv1.1, proteins"],
                ["Protein", "Protein", "GCA_001263275.1_ASM126327v1_protein.faa", "Habropoda laboriosa", "Habropoda laboriosa - ASM126327v1 GenBank Annotations, proteins"],
                ["Protein", "Protein", "halhal_OGSv1.2_pep.fa", "Halyomorpha halys", "Halyomorpha halys Official Gene Set v1.2, proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_022581195.2_ilHelZeax1.1_translated_cds.faa", "Helicoverpa zea", "Helicoverpa zea NCBI Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "GCA_002382865.1_K63_refined_pacbio_protein.fasta", "Heliothis virescens", " Heliothis virescens H_virescens_OGS1, proteins"],
                ["Protein", "Protein", "GCA_002382865.1_K63_refined_pacbio_translated_cds.fasta", "Heliothis virescens", " Heliothis virescens H_virescens_OGS1, translated CDS"],
                ["Protein", "Protein", "Holacanthella_duospinosa_annotation_1.0_pep.fa", "Holacanthella duospinosa", "Holacanthella duospinosa annotations Holacanthella_duospinosa_annotation v1.0, proteins"],
                ["Protein", "Protein", "HVIT_new_ids.faa", "Homalodisca vitripennis", "Homalodisca vitripennis Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "hyaazt_OGSv1.2_pep.fa", "Hyalella azteca", "Hyalella azteca OGSv1.2, peptides"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/ladful_OGSv1.0_pep.fa", "Ladona fulva", "Ladona fulva Official Gene Set ladful OGSv1.0, translated CDS"],
                ["Protein", "Protein", "laostr_OGSv1.2_pep.faa", "Laodelphax striatellus", "Laodelphax striatellus laostr_OGSv1.2, proteins"],
                ["Protein", "Protein", "Lalb_OGS_v5.42.pep.fa", "Lasioglossum albipes", "Lasioglossum albipes proteins, Lalb_OGS_v5.42"],
                ["Protein", "Protein", "LHES_new_ids.faa", "Latrodectus hesperus", "Latrodectus hesperus Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "LDEC_new_ids.faa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "lepdec_OGSv1.2_GCF_000500325.1_pep.fa", "Leptinotarsa decemlineata", "Leptinotarsa decemlineata OGSv1.2, proteins"],
                ["Protein", "Protein", "LLUN_new_ids.faa", "Limnephilus lunatus", "Limnephilus lunatus Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "locust.OGS_preQC.gff3.pep", "Locusta migratoria", "Locusta migratoria JAMg OGS v1, proteins"],
                ["Protein", "Protein", "LREC_new_ids.faa", "Loxosceles reclusa", "Loxosceles reclusa Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_015586225.1_ASM1558622v1_translated_cds-idupdate.faa", "Lucilia sericata", "Lucilia sericata NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "GCF_014839805.1_JHU_Msex_v1.0_translated_cds-idupdate.faa", "Manduca sexta", "Manduca sexta NCBI Annotation release 102, translated CDS"],
                ["Protein", "Protein", "ms_ogs_proteins.fa", "Manduca sexta", "Manduca_sexta_OGS_v2.0_peptide"],
                ["Protein", "Protein", "hf_OGS1.0.pep.fasta", "Mayetiola destructor", "Mayetiola destructor OGS_v1.0, proteins"],
                ["Protein", "Protein", "Mext_OGS_v1.0_pep.fa", "Medauroidea extradentata", "Medauroidea extradentata annotations OGS v1.0, proteins"],
                ["Protein", "Protein", "Megachile_rotundata_v1.1.pep.fa", "Megachile rotundata", "Megachile rotundata v1.1, proteins"],
                ["Protein", "Protein", "NCBI_Megachile_rotundata_Annotation_Release_101_protein.fa", "Megachile rotundata", "Megachile rotundata NCBI annotation release 101, proteins"],
                ["Protein", "Protein", "GCA_001276565.1_ASM127656v1_protein.faa", "Melipona quadrifasciata", "Melipona quadrifasciata GLEAN predicted proteins"],
                ["Protein", "Protein", "Melipona_quadrifasciata_v1.1.pep.fa", "Melipona quadrifasciata", "Melipona quadrifasciata v1.1. proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/micdem_OGSv1.0_pep.fa", "Microplitis demolitor", "Microplitis demolitor Official Gene Set micdem_OGSv1.0, proteins"],
                ["Protein", "Protein", "ref_Mdem2_protein.fa", "Microplitis demolitor", "Microplitis demolitor - NCBI Annotation Release 101, proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021155785.1_iyNeoFabr1.1_translated_cds.faa", "Neodiprion fabricii", "Neodiprion fabricii NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021901455.1_iyNeoLeco1.1_translated_cds.faa", "Neodiprion lecontei", "Neodiprion lecontei NCBI Annotation release 101, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021155775.1_iyNeoPine1.1_translated_cds.faa", "Neodiprion pinetum", "Neodiprion pinetum NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021901495.1_iyNeoVirg1.1_translated_cds.faa", "Neodiprion virginiana", "Neodiprion virginiana NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "GCF_001412225.1_Nicve_v1.0_protein.faa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Annotation Release 100 (GCF_001412225.1), proteins"],
                ["Protein", "Protein", "nicves_OGSv1.0_pep.fa", "Nicrophorus vespilloides", "Nicrophorus vespilloides Official Gene Set v1.0 proteins (Cunningham et al. 2015 Genome Biology and Evolution)"],
                ["Protein", "Protein", "nylful_OGSv1.0_pep.fa", "Nylanderia fulva", "Nylanderia fulva Official Gene Set nyful_OGSv1.0, proteins"],
                ["Protein", "Protein", "GCF_010583005.1_Obru_v1_translated_cds-idupdate.faa", "Odontomachus brunneus", "Odontomachus brunneus NCBI Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "oncfas_OGSv1.2_original_peptide.fa", "Oncopeltus fasciatus", "Oncopeltus fasciatus OGSv1.2, peptides"],
                ["Protein", "Protein", "OTAU_new_ids.faa", "Onthophagus taurus", "Onthophagus taurus Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "OABI_new_ids.faa", "Orussus abietinus", "Orussus abietinus Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_010583005.1_Obru_v1_cds_from_genomic-idupdate.fna", "Osmia lignaria", "Osmia lignaria NCBI Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "PVEN_new_ids.faa", "Pachypsylla venusta", "Pachypsylla venusta Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "PTEP_new_ids.faa", "Parasteatoda tepidariorum", "Parasteatoda tepidariorum Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "aug3.1.aa_new_ids.fa", "Parasteatoda tepidariorum", "Augustus_set_v3.0_proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_024362695.1_ilPecGoss1.1_translated_cds.faa", "Pectinophora gossypiella", "Pectinophora gossypiella NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_008802855.1_Ppyr1.3_translated_cds-idupdate.faa", "Photinus pyralis", "Photinus pyralis NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "GCF_001687245.1_Rhagoletis_zephyria_1.0_protein.faa", "Rhagoletis zephyria", "Rhagoletis zephyria Annotation Release 100 (GCF_001687245.1), proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_013339725.1_ASM1333972v1_translated_cds.faa", "Rhipicephalus microplus", "Rhipicephalus microplus NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021461395.2_iqSchAmer2.1_translated_cds.faa", "Schistocerca americana", "Schistocerca americana NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "GCF_023864275.1_iqSchCanc2.1_protein.faa", "Schistocerca cancellata", "GCF_023864275.1_iqSchCanc2.1_protein.faa"],
                ["Protein", "Protein", "/app/data/other_species/schgre/iqSchGreg1.2/scaffold/analyses/NCBI Schistocerca gregaria Annotation Release 100/GCF_023897955.1_iqSchGreg1.2_protein.faa", "Schistocerca gregaria", "Schistocerca gregaria NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/app/data/other_species/schnit/iqSchNite1.1/scaffold/analyses/NCBI Schistocerca nitens Annotation Release 100/GCF_023898315.1_iqSchNite1.1_protein.faa", "Schistocerca nitens", "Schistocerca nitens NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_021461385.2_iqSchPice1.1_translated_cds.faa", "Schistocerca piceifrons", "Schistocerca piceifrons NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "/app/data/other_species/schser/iqSchSeri2.2/scaffold/analyses/NCBI Schistocerca serialis cubense Annotation Release 100/GCF_023864345.2_iqSchSeri2.2_protein.faa", "Schistocerca serialis", "Schistocerca serialis NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "TCALIF_proteins_v1.0_new_ids.fasta", "Tigriopus californicus", "TCALIF_proteins_v1.0_new_ids.fasta"],
                ["Protein", "Protein", "GCA_000002335.3_Tcas5.2_protein.faa", "Tribolium castaneum", "Tribolium castaneum OGSv3, proteins"],
                ["Protein", "Protein", "GCF_000002335.3_Tcas5.2_protein.faa", "Tribolium castaneum", "Tribolium castaneum NCBI Annotation Release 103, proteins"],
                ["Protein", "Protein", "/usr/local/i5k/media/blast/db/GCF_015345945.1_Tmad_KSU_1.1_translated_cds.faa", "Tribolium madens", "Tribolium madens NCBI Annotation release 100, translated CDS"],
                ["Protein", "Protein", "TPRE_new_ids.faa", "Trichogramma pretiosum", "Trichogramma pretiosum Maker proteins v0.5.3 (BCM)"],
                ["Protein", "Protein", "GCF_002443255.1_Vdes_3.0_translated_cds.faa", "Varroa destructor", "Varroa destructor NCBI Varroa destructor Annotation Release 100, translated CDS"],
                ["Protein", "Protein", "GCF_002532875.1_vjacob_1.0_translated_cds.faa", "Varroa jacobsoni", "Varroa jacobsoni NCBI Annotation Release 100, translated CDS"],
                ["Protein", 
                "Protein", 
                "/usr/local/i5k/media/blast/db/GCF_019457755.1_ASM1945775v1_translated_cds.faa", 
                "Venturia canescens", 
                "Venturia canescens NCBI Annotation release 100, translated CDS"],
            ];

        }else if($endpoint === "clustal_stub") {
            
        }

        return $api_data;
    }

    public function format_stub_data($api_data){ //it works for BLAST. 
        // TODO: make sure it works for hmmer and clustal.
        $organisms = [];
        foreach($api_data as $line){
            $current_name = $line[3];
            $machine_name = str_replace(" ","-",strtolower($current_name));
            if(isset($organisms[$machine_name])){
                $organism = $organisms[$machine_name];
            } else {
                $organism = [];
                $organism["name"] = $current_name;
                $organism["machine_name"] = $machine_name;
                $organism["has_nucleotides"] = false;
                $organism["has_peptides"] = false;
            }

            if($line[1] == "Nucleotide"){
                $organism["has_nucleotides"] = true;
                $organism["nucleotides"][] = [
                    "dataset_type" => $line[0],
                    "machine_dataset_type" => str_replace(" ","-",strtolower($line[0])),
                    "value_id" => $line[2],
                    "full_label" => $line[4]
                ];
            }else if($line[1] == "Peptide"){
                $organism["has_peptides"] = true;
                $organism["peptides"][] = [
                    "dataset_type" => $line[0],
                    "machine_dataset_type" => str_replace(" ","-",strtolower($line[0])),
                    "value_id" => $line[2],
                    "full_label" => $line[4]
                ];
            }else if($line[1] == "Protein" && $line[0] == "Protein"){//only for HMMER
                $organism["has_peptides"] = true;
                $organism["peptides"][] = [
                    "dataset_type" => $line[0],
                    "machine_dataset_type" => str_replace(" ","-",strtolower($line[0])),
                    "value_id" => $line[2],
                    "full_label" => $line[4]
                ];
            }
            $organisms[$machine_name] = $organism;
        }
        return $organisms;
    }

    public function format_organism($true_value,$organisms,$organisms_array){
        $true_value->organism = $organisms[$true_value->organism];
        $current_name = $true_value->organism;
        $machine_name = str_replace(" ","-",strtolower($current_name));
                    if(isset($organisms_array[$machine_name])){
                        $organism = $organisms_array[$machine_name];
                    } else {
                        $organism = [];
                        $organism["name"] = $current_name;
                        $organism["machine_name"] = $machine_name;
                        $organism["has_nucleotides"] = false;
                        $organism["has_peptides"] = false;
                    }
                    
                    if($true_value->dataset_type == 'protein' && $true_value->molecule_type == "Protein"){//HMMER
                        $organism["has_peptides"] = true;
                        $organism["peptides"][] = [
                            "dataset_type" => $true_value->dataset_type,
                            "machine_dataset_type" => str_replace(" ","-",strtolower($true_value->dataset_type)),
                            "value_id" => $true_value->id,
                            "full_label" => $true_value->label
                        ];
                    }else if($true_value->molecule_type == "Peptide"){//BLAST 
                        $organism["has_peptides"] = true;
                        $organism["peptides"][] = [
                            "dataset_type" => $true_value->dataset_type,
                            "machine_dataset_type" => str_replace(" ","-",strtolower($true_value->dataset_type)),
                            "value_id" => $true_value->id,
                            "full_label" => $true_value->label
                        ];
                    }else if($true_value->molecule_type == "Nucleotide"){//BLAST 
                        $organism["has_nucleotides"] = true;
                        $organism["nucleotides"][] = [
                            "dataset_type" => $true_value->dataset_type,
                            "machine_dataset_type" => str_replace(" ","-",strtolower($true_value->dataset_type)),
                            "value_id" => $true_value->id,
                            "full_label" => $true_value->label
                        ];
                    }
                    return $organism;
    }

    public function format_api_data($api_data){
        $organisms = array_flip((array) $api_data->oragnisms); //KEEP THE TYPO
        $databases = (array)$api_data->databases;
        $organisms_array = [];
        foreach($databases as $value){
            if(isset($value->Protein)){
                foreach($value->Protein as $true_value){
                    $organism = $this->format_organism($true_value,$organisms,$organisms_array);
                    $machine_name = $organism["machine_name"];
                    $organisms_array[$machine_name] = $organism;
                }
            }

            if(isset($value->Nucleotide)){
                foreach($value->Nucleotide as $true_value){
                    $organism = $this->format_organism($true_value,$organisms,$organisms_array);
                    $machine_name = $organism["machine_name"];
                    $organisms_array[$machine_name] = $organism;
                }
            }

            if(isset($value->Peptide)){
                foreach($value->Peptide as $true_value){
                    $organism = $this->format_organism($true_value,$organisms,$organisms_array);
                    $machine_name = $organism["machine_name"];
                    $organisms_array[$machine_name] = $organism;
                }
            }
        }
        return $organisms_array;
    }


    public function count_databases($organisms){
        $nucleotide_genome_assembly = 0;
        $nucleotide_transcript = 0;
        $peptide_protein = 0;
        foreach($organisms as $org){
            if(isset($org["has_nucleotides"]) && $org["has_nucleotides"]){
                foreach($org["nucleotides"] as $n){
                    if($n["machine_dataset_type"] == "transcript") $nucleotide_transcript++;
                    if($n["machine_dataset_type"] == "genome-assembly") $nucleotide_genome_assembly++;
                }
            }
            if(isset($org["has_peptides"]) && $org["has_peptides"]){
                foreach($org["peptides"] as $p){
                    if($p["machine_dataset_type"] == "protein") $peptide_protein++;

                }
            }
        }
        return [
            "nucleotide_genome_assembly" =>  $nucleotide_genome_assembly,
            "nucleotide_transcript" => $nucleotide_transcript,
            "peptide_protein" => $peptide_protein
        ];
    }

    public function blast_form(){
        $content = [];
        $api_data = $this->get_api_data("blast_stub");
        $blast_api_connector_service  = \Drupal::service('custom_blast.api_connector');
        $api_data = $blast_api_connector_service->get_blast_databases(); //uncomment this line to make it work with the API
        $organisms = $this->format_api_data($api_data); //uncomment this line to make it work with the API
        // $organisms = $this->format_stub_data($api_data); //comment out this line to make it work with the API
        $database_totals = $this->count_databases($organisms);
        $content["api_data"] = $api_data;
        $content["organisms"] = $organisms;
        $content["database_totals"] = $database_totals;
        $content["tool_name"] = "BLAST";
        
        return [
            '#theme' => 'custom_blast',
            '#content' => $content,
        ];
    }

    public function hmmer_form(){
        // dd($_REQUEST);
        $content = [];
        $api_data = $this->get_api_data("hmmer_stub");
        $blast_api_connector_service  = \Drupal::service('custom_blast.api_connector');
        $api_data = $blast_api_connector_service->get_hmmer_databases(); //uncomment this line to make it work with the API
        $organisms = $this->format_api_data($api_data); //uncomment this line to make it work with the API
        // $organisms = $this->format_stub_data($api_data); //comment out this line to make it work with the API
        $database_totals = $this->count_databases($organisms);
        $content["api_data"] = $api_data;
        $content["organisms"] = $organisms;
        $content["database_totals"] = $database_totals;
        $content["tool_name"] = "HMMER";

        return [
            '#theme' => 'custom_hmmer',
            '#content' => $content,
        ];
    }    
    
    public function clustal_form(){
        $content = [];
        return [
            '#theme' => 'custom_clustal',
            '#content' => $content,
        ];
    }
}