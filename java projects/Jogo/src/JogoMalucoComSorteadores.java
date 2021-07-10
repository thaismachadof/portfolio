public class JogoMalucoComSorteadores extends JogoDeDoisJogadores {

    private Sorteador sorteador1;

    private Sorteador sorteador2;

    public JogoMalucoComSorteadores(String nomeDoJogo, String nomeDoJogador1, String nomeDoJogador2, int numeroDeRodadas,
                                    Sorteador sorteador1, Sorteador sorteador2) {
        super(nomeDoJogo, nomeDoJogador1, nomeDoJogador2, numeroDeRodadas);
        this.sorteador1 = sorteador1;
        this.sorteador2 = sorteador2;
    }

    @Override protected int executarRodadaDoJogo() {

        int pontosJogador1 = sorteador1.sortear();
        int pontosJogador2 = sorteador2.sortear();

        if(pontosJogador1 > pontosJogador2)
            return 1;
        else if(pontosJogador2 > pontosJogador1)
            return 2;
        else
            return 0;
    }
}
