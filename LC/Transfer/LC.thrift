namespace php LC.Transfer
namespace js LC.Transfer

enum SkillType{
ACTIVE,
PASSIVE
}
enum Unit{
NONE,
PERCENT,
SECONDS
}

struct Character{
1: required i32 characterId,
2: required string name
}

struct ConditionType{
1: i32 conditionTypeId,
2: string name
}
struct Condition{
1: required i32 conditionId,
2: required ConditionType conditionType,
3: required string value
}

struct EffectType{
1: required i32 effectTypeId,
2: required string name,
3: optional Unit unit
}
struct Effect{
1: required i32 effectId,
2: required EffectType effectType,
3: required double value
}

struct Tier{
1: required i32 tierId,
2: required i32 sp,
3: optional i32 mana,
4: required set<Effect> effects,
5: required set<Condition> conditions,
6: optional double money
}

struct Skill{
1: required i32 skillId,
2: required string name,
3: required Character character,
4: required string info,
5: required SkillType type,
6: required set<Tier> tiers,
7: required string iconURL 
}

service Skills{
oneway void send(1:Skill skill),
i32 getSkillId(1:string name),
i32 getCharacterId(1:string name),
i32 getEffectTypeId(1:string name)

}