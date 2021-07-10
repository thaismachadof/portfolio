import java.util.ArrayList;
import java.util.Random;

public class Pacotinho extends ArrayList<Figurinha> {

    private Album album;

    private ArrayList<Figurinha> figurinhasDoPacotinho = new ArrayList<>();

    public Pacotinho(Album album) {
        this.album = album;
        adicionarFigurinhasAleatorias();
    }

    // sobrecarga no costrutor, passando aqui as posições desejadas
    public Pacotinho(Album album, int[] posicoes) {
        this.album = album;

        if(album.getQuantFigurinhasPorPacotinho() == posicoes.length) {
            for(int i=0; i<posicoes.length; i++) {
                Figurinha figurinha = new Figurinha(posicoes[i]);
                adicionarFigurinha(figurinha);
            }
        }
        else
            throw new RuntimeException("Pacotinho no tamanho errado!");
    }

    private void adicionarFigurinha(Figurinha figurinha) {

        figurinhasDoPacotinho.add(figurinha);
    }

    private void adicionarFigurinhasAleatorias() {
        int maxPosicao = album.getTamanho();
        int quantFigurinhasPorPacotinho = album.getQuantFigurinhasPorPacotinho();

        for (int i = 1; i <= quantFigurinhasPorPacotinho; i++) {
            Random random = new Random();
            int posicao = random.nextInt(maxPosicao); // gera um número aleatório para a posição

            Figurinha figurinha = new Figurinha(posicao);
            figurinhasDoPacotinho.add(figurinha);
        }
    }

    public ArrayList<Figurinha> getFigurinhasDoPacotinho() {
        return figurinhasDoPacotinho;
    }

    public Album getAlbum() {
        return this.album;
    }
}