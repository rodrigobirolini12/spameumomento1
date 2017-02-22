@extends('painel.templates.theme1')

@section('content')
	 <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
                        <div class="theme-panel hidden-xs hidden-sm">
                            <div class="toggler"> </div>
                            <div class="toggler-close"> </div>
                            <div class="theme-options">
                                <div class="theme-option theme-colors clearfix">
                                    <span> THEME COLOR </span>
                                    <ul>
                                        <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                        <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                        <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                        <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                        <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                        <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                    </ul>
                                </div>
                                <div class="theme-option">
                                    <span> Theme Style </span>
                                    <select class="layout-style-option form-control input-sm" >
                                        <option value="square" selected="selected">Square corners</option>
                                        <option value="rounded">Rounded corners</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Layout </span>
                                    <select class="layout-option form-control input-sm">
                                        <option value="fluid" selected="selected">Fluid</option>
                                        <option value="boxed">Boxed</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Header </span>
                                    <select class="page-header-option form-control input-sm">
                                        <option value="fixed" selected="selected">Fixed</option>
                                        <option value="default">Default</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Top Menu Dropdown</span>
                                    <select class="page-header-top-dropdown-style-option form-control input-sm">
                                        <option value="light" selected="selected">Light</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Sidebar Mode</span>
                                    <select class="sidebar-option form-control input-sm">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected="selected">Default</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Sidebar Menu </span>
                                    <select class="sidebar-menu-option form-control input-sm">
                                        <option value="accordion" selected="selected">Accordion</option>
                                        <option value="hover">Hover</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Sidebar Style </span>
                                    <select class="sidebar-style-option form-control input-sm">
                                        <option value="default" selected="selected">Default</option>
                                        <option value="light">Light</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Sidebar Position </span>
                                    <select class="sidebar-pos-option form-control input-sm">
                                        <option value="left" selected="selected">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                                <div class="theme-option">
                                    <span> Footer </span>
                                    <select class="page-footer-option form-control input-sm">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected="selected">Default</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Alunos</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Listagem</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                    <i class="icon-calendar"></i>&nbsp;
                                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Alunos
                            <small>Listagem de todos os alunos({{$alunos->count()}})</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        
                    
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="note note-success">
                                    <p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>
                                </div>
                        
                                <a  class="btn green-haze btn-outline sbold uppercase margin-bottom-5 btn-cadastrar" data-toggle="modal" href="#modal-cadastro-aluno">Cadastrar</a>
                                 <div class="portlet-input input-inline input-small pull-right">
                                <form action="/painel/alunos/pesquisar" send="/painel/alunos/pesquisar/" method="post" class="form-pesquisa">
                                                            <div class="input-icon right">
                                                                <i class="icon-magnifier"></i>
                                                                <input type="text" name="palavra_pesquisa" class="form-control input-circle texto-pesquisa" placeholder="search..."> </div></form>
                                                        </div>
                                 <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Alunos </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body flip-scroll">
                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <thead class="flip-content">
                                                <tr>
                                                    <th > Matricula </th>
                                                    <th> Nome </th>
                                                    <th class="numeric"> Telefone </th>
                                                    <th class="numeric"> Data de Nascimento </th>
                                                    <th></th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($alunos as $a)	
                                                <tr>
                                                    <td> {{$a->numero}} </td>
                                                    <td> {{$a->nome}} </td>
                                                    <td> {{$a->telefone}} </td>
                                                    <td class="numeric"> {{$a->data_nascimento}} </td>
                                                    <td>
                                                    	 <a href='{{url("/painel/alunos/pais/{$a->id}") }}' class="btn btn-outline btn-circle btn-sm green" >
                                                                <i class="fa fa-user" style="font-size: 17px;"></i> </a>
                                                         <a href="javascript:;" class="btn btn-outline btn-circle btn-sm blue" onclick="edit( '/painel/alunos/editar/{{$a->id}}' )">
                                                                <i class="fa fa-edit" style="font-size: 17px;"></i> </a>
                                                         <a href="javascript:;" class="btn btn-outline btn-circle btn-sm red" onclick="deletar('/painel/alunos/deletar/{{$a->id}}')">
                                                                <i class="fa fa-trash" style="font-size: 17px;"></i> </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                	<td colspan='4'>Nenhum aluno encontrado</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modal-cadastro-aluno" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Gestão de Aluno</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    	<div class="row">
                                                           <div class="col-md-12">
                                                              <!-- BEGIN VALIDATION STATES-->
                                                              <div class="portlet light portlet-fit portlet-form bordered">
                                                                 <div class="portlet-body">
                                                                    <!-- BEGIN FORM-->
                                                            <form id="form_sample_3"   action = "/painel/alunos/adicionar-aluno" send="/painel/alunos/adicionar-aluno" class="form-gestao">
                                                                    	{!! csrf_field() !!}	 
                                                                       <div class="form-body">
                                                                          <div class="form-group form-md-line-input form-md-floating-label ">
                                                                            <select class="form-control" name="id_turma">
                                                                                <option value="0"></option>
                                                                                @foreach ($turmas as $turma)
                                                                                        <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                                                                                @endforeach
                                      
                                                                            </select>
                                                                            <label for="form_control_1">Turma</label>
                                                                            <span class="help-block">Selecione a turma...</span>
                                                                        </div>
                                                                          <div class="form-group form-md-line-input form-md-floating-label">
                                                                             <input type="text" class="form-control" name="nome" id="form_control_1">
                                                                             <label for="form_control_1">Nome</label>
                                                                             <span class="help-block">Nome completo do estudante</span>
                                                                          </div>
                                                                          <div class="form-group form-md-line-input form-md-floating-label">
                                                                             <input type="text" class="form-control phone_with_ddd" name="telefone" value="" id="form_control_1">
                                                                             <label for="form_control_1">Telefone</label>
                                                                             <span class="help-block"</span>
                                                                          </div>
                                                                          <div class="form-group form-md-line-input form-md-floating-label">
                                                                             <input type="text" class="form-control data-nascimento" name="data_nascimento" id="form_control_1">
                                                                             <label for="form_control_1">Data de nascimento</label>
                                                                          </div>
                                                                       </div>
                                                                       
                                                                       <div class="row form-group form-md-line-input form-md-floating-label" >
                                                                       		<div class="col-md-12">
                                                                       		<div class="alert alert-warning a-warning" style="display: none;"> </div>
                                                                       		<div class="alert alert-success a-success" style="display: none;"><strong>Success!</strong> Processamento Realizado com Sucesso</div>
                                                                       		<div class="a-processing" style="display: none;">Enviando os dados, por favor aguarde</div>
                                                                       		</div>	
                                                                       </div>
                                                                       <div class="form-actions">
                                                                          <div class="row">
                                                                             <div class="col-md-12">
                                                                                <button type="submit" class="btn dark">Validate</button>
                                                                                <button type="reset" class="btn default">Reset</button>
                                                                             </div>
                                                                          </div>
                                                                       </div>
                                                                    </form>
                                                                    <!-- END FORM-->
                                                                 </div>
                                                              </div>
                                                              <!-- END VALIDATION STATES-->
                                                           </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        
                                        
                                    <!-- BEGIN MODAL DELETE -->    
                                        <div id="delete" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Confirma&ccedil;&atilde;o</h4>
                                                    </div>
                                                    <form >
                                                    		<input type="hidden" name="url_deletar" value ="0" class="url-deletar">
                                                            <div class="modal-body">
                                                            	
                                                                <p> Deseja realmente excluir este registro ? </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                                                <button type="submit" data-dismiss="modal" class="btn green btn-confirmar-deletar">Deletar</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                 
@endsection


@section('scripts-individual')
 		 <!--  <script src="../assets/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
         <script src="../assets/metronic/assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>-->
         <script>
			$(function(){
					
				});

			var urlAdd = "/painel/alunos/adicionar";
       </script>
@endsection
       
       