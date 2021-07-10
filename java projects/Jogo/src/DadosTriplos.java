public class DadosTriplos implements Sorteador {

    public int dado1;

    public int dado2;

    public int dado3;

    Dado dado;

    public DadosTriplos() {
        this.dado = new Dado();
    }

    @Override public int sortear() {
        this.dado1 = dado.sortear();
        this.dado2 = dado.sortear();
        this.dado3 = dado.sortear();

        return dado1 + dado2 + dado3;
    }
}
