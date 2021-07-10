import java.util.ArrayList;

public class Album extends ArrayList<Figurinha> {

    public static final int PERCENTUAL_MINIMO_PARA_AUTO_COMPLETAR = 90;  // 90%

    private final int quantFigurinhasPorPacotinho;

    private final int tamanho; // quantidade de figurinhas no álbum

    private ArrayList<Figurinha> figurinhasRepetidas; // estrutura que armazena todas as figurinhas repetidas

    private Figurinha[] figurinhasDoAlbum; //

    private int quantPacotinhosComprados = 0;

    public Album(int tamanhoDoAlbum, int quantFigurinhasPorPacotinho) {
        this.tamanho = tamanhoDoAlbum;
        this.quantFigurinhasPorPacotinho = quantFigurinhasPorPacotinho;
        figurinhasDoAlbum = new Figurinha[tamanhoDoAlbum]; // cria um vetor com a quantidade de figurinhas do álbum
        figurinhasRepetidas = new ArrayList<>();
    }

    public void receberNovoPacotinho(Pacotinho pacotinho) {
        quantPacotinhosComprados++;

        ArrayList<Figurinha> figurinhasDoPacotinho = pacotinho.getFigurinhasDoPacotinho();
        for (int i=0; i<figurinhasDoPacotinho.size(); i++) {
            if(possuiFigurinhaColada(figurinhasDoPacotinho.get(i).getPosicao())) {
                figurinhasRepetidas.add(figurinhasDoPacotinho.get(i));
            }
            else
            {
                figurinhasDoAlbum[figurinhasDoPacotinho.get(i).getPosicao()] = figurinhasDoPacotinho.get(i);
            }
        }
    }

    public void autoCompletar() {
        // verifica se o álbum já está suficientemente cheio
        if(tamanho*PERCENTUAL_MINIMO_PARA_AUTO_COMPLETAR/100 == getQuantFigurinhasColadas()) {
            for(int i=0; i<figurinhasDoAlbum.length; i++) {
                if(figurinhasDoAlbum[i] == null) {
                    figurinhasDoAlbum[i] = new Figurinha(i);
                }
            }
        }
    }

    public int getTamanho() {
        return tamanho;
    }

    public int getQuantFigurinhasPorPacotinho() {
        return quantFigurinhasPorPacotinho;
    }

    public int getQuantFigurinhasColadas() {
        int quantFigurinhasColadas = 0;

        for(int i=0; i<figurinhasDoAlbum.length; i++) {
            if(possuiFigurinhaColada(i)) {
                quantFigurinhasColadas++;
            }
        }
        return quantFigurinhasColadas;
    }

    public int getQuantFigurinhasRepetidas() {
        return figurinhasRepetidas.size();
    }

    public boolean possuiFigurinhaColada(int posicao) {
        if(posicao < 0 || posicao > tamanho)
        {
            return false;
        }

        if (figurinhasDoAlbum[posicao] == null ) {
            return false;
        }
        else
            return true;
    }

    public boolean possuiFigurinhaRepetida(int posicao) {
        for(int i=0; i<figurinhasRepetidas.size(); i++) {
            if(figurinhasRepetidas.get(i).getPosicao() == posicao) {
                return true;
            }
        }
        return false;
    }

    public int getQuantFigurinhasFaltantes() {
        int figurinhasFaltantes = 0;

        for(int i=0; i<figurinhasDoAlbum.length; i++) {
            if(figurinhasDoAlbum[i] == null) {
                figurinhasFaltantes++;
            }
        }
        return figurinhasFaltantes;
    }
}
