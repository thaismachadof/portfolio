public class DadosDeGamao implements Sorteador {

    public int dado1;

    public int dado2;

    Dado dado;

    public DadosDeGamao() {
        this.dado = new Dado();
    }

    @Override public int sortear() {
        this.dado1 = dado.sortear();
        this.dado2 = dado.sortear();

        if(dado1 == dado2) {
            return 2 * (dado1 + dado2);
        }
        else
            return dado1 + dado2;
    }
}
