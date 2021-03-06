import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class ContaCorrenteTest {

    private static final float ERRO_ACEITAVEL_NOS_FLOATS = 0.000001f;

    private Pessoa maria;
    private Pessoa joao;

    private Banco banco;

    private Agencia minhaAgencia;

    private ContaCorrente contaDaMaria;
    private ContaCorrente contaDoJoao;

    @Before
    public void setUp() {
        banco = new Banco();

        // cria algumas pessoas
        maria = new Pessoa("Maria", 12345678);
        joao = new Pessoa("Joao", 23222);

        // cria uma agencia
        minhaAgencia = new Agencia(banco, 1, "Agência Principal");

        ContaCorrente.numeroDeContasCriadas = 0;  // reseta o static da classe

        // cria algumas contas
        contaDaMaria = new ContaCorrente(maria, minhaAgencia);
        contaDoJoao = new ContaCorrente(joao, minhaAgencia);
    }

    @Test
    public void testarNumerosAutomaticosDeContas() {
        assertEquals(1, contaDaMaria.getNumeroDaConta());
        assertEquals(2, contaDoJoao.getNumeroDaConta());
//        ContaCorrente novaConta = new ContaCorrente(maria, minhaAgencia);
//        long numeroDaConta = novaConta.getNumeroDaConta();
//
//        assertEquals(numeroDaConta + 1,
//                (new ContaCorrente(joao, minhaAgencia).getNumeroDaConta()));
//        assertEquals(numeroDaConta + 2,
//                (new ContaCorrente(joao, minhaAgencia).getNumeroDaConta());
    }

    @Test
    public void testarDeposito() throws ValorNaoPositivoException {
        checarSaldoInicial(contaDaMaria);

        contaDaMaria.depositar(1000);
        assertFloatEquals(1010f, contaDaMaria.getSaldoEmReais());

        contaDaMaria.depositar(500);
        assertFloatEquals(1510f, contaDaMaria.getSaldoEmReais());
    }

    @Test (expected = ValorNaoPositivoException.class)
    public void testarDepositoInvalido() throws ValorNaoPositivoException {
        checarSaldoInicial(contaDaMaria);

        contaDaMaria.depositar(-1000);
    }

    @Test
    public void testarSaque() throws SaldoInsuficienteException, ValorNaoPositivoException {
        checarSaldoInicial(contaDaMaria);
        contaDaMaria.sacar(7);
        assertEquals(3f, contaDaMaria.getSaldoEmReais(), ERRO_ACEITAVEL_NOS_FLOATS);
    }

    @Test (expected = SaldoInsuficienteException.class)
    public void testarSaqueSemFundos() throws SaldoInsuficienteException, ValorNaoPositivoException {
        checarSaldoInicial(contaDaMaria);
        contaDaMaria.sacar(1700);
    }

    @Test (expected = ValorNaoPositivoException.class)
    public void testarSaqueNegativo() throws ValorNaoPositivoException, SaldoInsuficienteException {
        checarSaldoInicial(contaDaMaria);

        contaDaMaria.sacar(-1000);
    }

    @Test
    public void testarTransferecia() throws SaldoInsuficienteException, ValorNaoPositivoException {
        // sanity check: as contas já começam com saldo 10 (regra de negócio)
        checarSaldoInicial(contaDaMaria);
        checarSaldoInicial(contaDoJoao);

        contaDaMaria.transferir(7, contaDoJoao);

        assertFloatEquals(3f, contaDaMaria.getSaldoEmReais());
        assertFloatEquals(17f, contaDoJoao.getSaldoEmReais());
    }

    @Test (expected = SaldoInsuficienteException.class)
    public void testarTransfereciaSemFundosNaContaDeOrigem() throws SaldoInsuficienteException, ValorNaoPositivoException {
        // sanity check: as contas já começam com saldo 10 (regra de negócio)
        assertFloatEquals(10f, contaDaMaria.getSaldoEmReais());
        assertFloatEquals(10f, contaDoJoao.getSaldoEmReais());

        contaDaMaria.transferir(2000, contaDoJoao);
        // a transferência NÃO DEVE SER REALIZADA, porque não fundos na conta de origem (Maria).
    }

    @Test (expected = ValorNaoPositivoException.class)
    public void testarTransferenciaNegativa() throws ValorNaoPositivoException, SaldoInsuficienteException {
        checarSaldoInicial(contaDaMaria);

        contaDaMaria.transferir(-1000, contaDoJoao);
    }

    private void checarSaldoInicial(ContaCorrente conta) {
        // sanity check: as contas já começam com saldo 10 (regra de negócio)
        assertFloatEquals(
                ContaCorrente.SALDO_INICIAL_DE_NOVAS_CONTAS,
                conta.getSaldoEmReais());
    }

    private static void assertFloatEquals(float expected, float actual) {
        assertEquals(expected, actual, ERRO_ACEITAVEL_NOS_FLOATS);
    }
}