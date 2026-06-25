# Social Digital — Mapeamento de Features

Remake em Laravel 12 do projeto original `pi353socialdigital` — sistema web de gestão para assistência social, destinado a assistentes sociais e membros de organizações que prestam apoio a famílias em situação de vulnerabilidade.

---

## Tipos de usuário

| Tipo | Papel | Acesso |
|---|---|---|
| `admin` | Administrador | Painel admin completo |
| `user` | Assistente Social / Membro | Área do usuário |

> No original havia 3 tipos (1 = admin, 2 = assistente social, 3 = membro). O remake unifica em dois papéis: `admin` e `user`.

---

## Features

### Autenticação
| Feature | Status |
|---|---|
| Login por email + senha | Feito |
| Logout | Feito |
| Proteção de rotas por papel (admin / user) | Feito |
| Middleware `admin` | Feito |

### Admin — Gestão de Usuários
| Feature | Status |
|---|---|
| Listar usuários (tabela com busca) | Feito |
| Cadastrar usuário (nome, CPF, RG, email, senha, celular, nascimento, tipo) | Feito |
| Editar usuário | Feito |
| Excluir usuário | Feito |
| Buscar usuário (por nome, CPF, ID) | Feito |
| Imprimir relatório de usuário | Feito |
| Geração automática de senha | Feito |

### Admin — Gestão de Visitas
| Feature | Status |
|---|---|
| Listar visitas | Pendente |
| Registrar visita (assistente social, membro, data, hora, observação, descrição, endereço completo) | Pendente |
| Editar visita | Pendente |
| Excluir visita | Pendente |
| Buscar visita | Pendente |
| Imprimir relatório de visita | Pendente |

### Admin — Dashboard
| Feature | Status |
|---|---|
| Visão geral (totais de usuários e visitas) | Pendente |
| Painel de visitas | Pendente |
| Gráficos | Pendente |

### Usuário (Assistente Social / Membro)
| Feature | Status |
|---|---|
| Home institucional | Pendente |
| Perfil (visualização dos próprios dados) | Pendente |
| Avaliação do sistema (notas 1–5 para velocidade, usabilidade, design, atendimento e geral) | Pendente |
| Contato | Pendente |
