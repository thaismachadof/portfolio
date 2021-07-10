import java.util.ArrayList;

public abstract class JogoDeDoisJogadores {

    private String nomeJogo;

    private String nomeJogador1;

    private String nomeJogador2;

    private int numeroDeRodadas;

    private ArrayList<Integer> historicoResultados;

    public JogoDeDoisJogadores(String nomeDoJogo, String nomeDoJogador1, String nomeDoJogador2, int numeroDeRodadas) {

        this.nomeJogo = nomeDoJogo;
        this.nomeJogador1 = nomeDoJogador1;
        this.nomeJogador2 = nomeDoJogador2;
        this.numeroDeRodadas = numeroDeRodadas;

        historicoResultados = new ArrayList<>();
    }

    public String jogar() {
        int rodadasJogador1 = 0;
        int rodadasJogador2 = 0;

        for(int i = 0; i < numeroDeRodadas; i++) {
            historicoResultados.add(executarRodadaDoJogo());

            if(historicoResultados.get(i) == 1)
                rodadasJogador1++;
            else if(historicoResultados.get(i) == 2)
                rodadasJogador2++;
        }

        if(rodadasJogador1 > rodadasJogador2)
            return "O jogador " +nomeJogador1+ " venceu o jogo por " +rodadasJogador1+ " a " +rodadasJogador2;
        else if(rodadasJogador2 > rodadasJogador1)
            return "O jogador " +nomeJogador2+ " venceu o jogo por " +rodadasJogador2+ " a " +rodadasJogador1;
        else
            return "O jogo terminou em empate após " +numeroDeRodadas+ " rodadas.";
    }

    protected abstract int executarRodadaDoJogo();

    public String getNomeJogo() {
        return nomeJogo;
    }

    public String getNomeJogador1() {
        return nomeJogador1;
    }

    public String getNomeJogador2() {
        return nomeJogador2;
    }

    public int getNumeroDeRodadas() {
        return numeroDeRodadas;
    }
}
