import java.util.Objects;

public class Livro extends ArtigoCultural {

    private final int codigoISBN;

    private String titulo;

    private String autor;

    private String editora;

    private Categoria categoria;

    private int anoPublicacao;

    private int numeroDePaginas;

    public Livro(int codigoISBN,
                 String titulo, String autor, String editora, int anoPublicacao, Categoria categoria) {

        super(codigoISBN,
                String.format("Livro: %s (%s, %d)",
                titulo, autor, anoPublicacao));

        this.codigoISBN = codigoISBN;
        this.titulo = titulo;
        this.autor = autor;
        this.editora = editora;
        this.anoPublicacao = anoPublicacao;
        this.categoria = categoria;
    }

    public int getCodigoISBN() {
        return codigoISBN;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getEditora() {
        return editora;
    }

    public void setEditora(String editora) {
        this.editora = editora;
    }

    public int getAnoPublicacao() {
        return anoPublicacao;
    }

    public void setAnoPublicacao(int anoPublicacao) {
        this.anoPublicacao = anoPublicacao;
    }

    public int getNumeroDePaginas() {
        return numeroDePaginas;
    }

    public void setNumeroDePaginas(int numeroDePaginas) {
        this.numeroDePaginas = numeroDePaginas;
    }

    public String getCategoria() {
        return this.categoria.getAbreviacao_categoria();
    }

    @Override
    public String toString() {
        return "Livro: " +titulo+ "\n Autor: " +autor+ "\n Categoria: " +categoria.getAbreviacao_categoria();
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof Livro)) return false;
        Livro item = (Livro) o;
        return codigoISBN == item.codigoISBN &&
                Objects.equals(categoria, item.categoria);
    }

    @Override
    public int hashCode() {
        return Objects.hash(codigoISBN, categoria);
    }
}
