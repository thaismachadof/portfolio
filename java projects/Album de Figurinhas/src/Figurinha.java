public class Figurinha {

    private final int posicaoNoAlbum;

    private String url;

    public Figurinha(int posicao) {

        this.posicaoNoAlbum = posicao;
    }

    /**
     * @return A posição que esta figurinha deve ocupar no álbum
     */
    public int getPosicao() {

        return posicaoNoAlbum;
    }

    public void setUrl(String url) {
        this.url = url;
    }
}
