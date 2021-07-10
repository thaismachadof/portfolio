import java.util.Scanner;

public class Principal {

    private static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {

        Banco meuBanco = new Banco();

        boolean terminar = false;

        while (!terminar) {

            apresentarMenu();
            String opcao = lerOpcao();

            switch (opcao.toUpperCase()) {
                case "D":
                    System.out.print("Número da conta: ");
                    long numeroDaConta = Long.parseLong(scanner.nextLine());
                    System.out.print("Valor desejado: ");
                    float valor = Float.parseFloat(scanner.nextLine());

                    ContaCorrente contaCorrente = meuBanco.localizarConta(numeroDaConta);
                    if (contaCorrente != null) {
                        try {
                            contaCorrente.depositar(valor);
                            System.out.println(contaCorrente.getUltimoItemHistorico());
                        } catch(ValorNaoPositivoException e) {
                            System.out.println("Valor inválido!");
                        }
                    } else {
                        System.out.println("Conta inexistente!");
                    }
                    break;  // switch

                case "S":
                    System.out.print("Número da conta: ");
                    numeroDaConta = Long.parseLong(scanner.nextLine());
                    System.out.print("Valor desejado: ");
                    valor = Float.parseFloat(scanner.nextLine());

                    contaCorrente = meuBanco.localizarConta(numeroDaConta);
                    if (contaCorrente != null) {

                        try {
                            contaCorrente.sacar(valor);
                        } catch (ValorNaoPositivoException e) {

                            // qual o tratamento que eu quero dar?
                            System.out.println("Valor inválido!");

                        } catch (SaldoInsuficienteException e) {

                            // qual o tratamento que eu quero dar para esse outro caso?

                            // 1) enviarEmail(contaCorrente.getAgencia().getGerenteGeral(),
                            //        "Usuario precisando de emprestimo!!!");   ???

                            // 2) resgate de aplicação automática  ???
                            //
                            //  etc. etc.

                            System.out.println("Saldo insuficiente!!!");
                        }




                        System.out.println(contaCorrente.getUltimoItemHistorico());
                    } else {
                        System.out.println("Conta inexistente!");
                    }
                    break;  // switch

                case "T":
                    System.out.println("Digite o número da sua conta, a conta de destino e o valor da transferência: ");
                    long conta1 = scanner.nextLong();
                    long conta2 = scanner.nextLong();
                    valor = scanner.nextFloat();

                    ContaCorrente contaOrigem = meuBanco.localizarConta(conta1);
                    ContaCorrente contaDestino = meuBanco.localizarConta(conta2);

                    if(contaDestino != null && contaOrigem != null) {
                        try {

                            contaOrigem.transferir(valor, contaDestino);
                            System.out.println(contaOrigem.getUltimoItemHistorico());
                            System.out.println(contaDestino.getUltimoItemHistorico());

                        } catch (ValorNaoPositivoException e) {

                            System.out.println("Valor inválido!");

                        } catch (SaldoInsuficienteException e) {

                            System.out.println("Saldo insuficiente!!!");

                        }
                    }
                    else
                        System.out.println("ERRO: número da conta não existe ou foi digitado errado!");
                    break;

                case "C":
                    System.out.print("Número da conta: ");
                    long numero = Long.parseLong(scanner.nextLine());
                    ContaCorrente conta = meuBanco.localizarConta(numero);
                    if (conta != null) {
                        System.out.println(String.format("Saldo = %.2f",
                                conta.getSaldoEmReais()));
                    } else {
                        System.out.println("Conta inexistente!");
                    }
                    break;  // switch

                case "P":
                    System.out.print("Nome: ");
                    String nome = scanner.nextLine();
                    System.out.print("CPF: ");
                    long cpf = Long.parseLong(scanner.nextLine());

                    meuBanco.cadastrarCorrentista(nome, cpf);
                    System.out.println("Cadastro realizado!");

                    break;  // switch

                case "N":
                    System.out.print("CPF do correntista: ");
                    cpf = Long.parseLong(scanner.nextLine());
                    Pessoa correntista = meuBanco.localizarCorrentista(cpf);
                    if (correntista != null) {
                        ContaCorrente novaConta = meuBanco.cadastrarConta(correntista);
                        System.out.println("Conta criada com o número " + novaConta.getNumeroDaConta());
                    } else {
                        System.out.println("Correntista não existe!");
                    }
                    break;  // switch

                case "X":
                    terminar = true;
                    break;

                default:
                    System.out.println("Opção inválida");
            }
        }

        System.out.println("Tchau!");
    }

    private static void apresentarMenu() {
        System.out.println(
                "\n------\n" +
                        "(D)epositar\n" +
                        "(S)acar\n" +
                        "(T)ransferir\n" +
                        "(C)onsultar saldo\n" +
                        "Cadastrar (P)essoa como correntista\n" +
                        "Criar (N)ova conta\n" +
                        "(X) para sair\n");
    }

    private static String lerOpcao() {
        System.out.print("\nAção desejada: ");
        return scanner.nextLine();
    }



}