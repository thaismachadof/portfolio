public enum Categoria {
    ENCICLOPEDIA("ENC"),
    LIVRO_DIDATICO("LD"),
    FICCAO("FIC"),
    BIOGRAFIA("BIO"),
    ARTE("AR"),
    DICIONARIO("DIC"),
    NAO_FICCAO("NF");

    private String abreviacao_categoria;

    Categoria(String categoria) {
        this.abreviacao_categoria = categoria;
    }

    public String getAbreviacao_categoria() {
        return this.abreviacao_categoria;
    }
}
