public class Principal {

    public static void main (String args[]) {
        for(int i = 1; i <=100; i++) {
            DadosDeGamao dadoJogador1 = new DadosDeGamao();

            DadosTriplos dadoJogador2 = new DadosTriplos();

            JogoMalucoComSorteadores jogo = new JogoMalucoComSorteadores("jogo1", "jogador 1",
                    "jogador 2", i, dadoJogador1, dadoJogador2);

            System.out.println(jogo.jogar());
        }
    }
}
