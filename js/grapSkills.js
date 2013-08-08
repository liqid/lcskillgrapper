var JSClient = function (){
	this.transport = new Thrift.Transport("http://localhost:8888/index.php");
	this.protocol = new Thrift.Protocol(this.transport);
	this.client = new LC.Transfer.SkillsClient(this.protocol),
	this.data = "";
	this.mainPage = "http://guide.lastchaos.bplaced.net/index.php?title=Skills";
};
JSClient.prototype.hello = function() {
	this.getLinksToSkills();
	//this.data = this.client.getId("test",this.show);
};
JSClient.prototype.send = function() {
	this.Skill = new LC.Transfer.Skill();
	this.Skill.skillId = null;
	this.Skill.name = null;
	this.Skill.character = null;
	this.Skill.info = null;
	this.Skill.type = null;
	this.Skill.tiers = null;
	this.Skill.iconURL = null;
}

JSClient.prototype.show = function() {
	console.log("response: " + this.data);
}
JSClient.prototype.showAjax = function() {
	console.log($(this.mainDOM).find('a'));
}
JSClient.prototype.getLinksToSkills = function() {
	var self = this;
	var win = open(this.mainPage, 'skills');
	var intval = setInterval(function(){
		$(win.document).ready(function(){
			console.log(win);
			clearInterval(intval);
		});
	}, 1000);
}

var bla = new JSClient();